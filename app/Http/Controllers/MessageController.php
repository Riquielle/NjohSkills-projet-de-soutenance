<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Formateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Afficher la conversation entre un apprenant et un formateur.
     */
    public function conversation($id = null)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | APPRENANT
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'apprenant') {

            // Formateurs des formations auxquelles l'apprenant est inscrit
            $formateurs = Formateur::whereHas(
                'formations.inscriptions',
                function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }
            )
            ->with('user')
            ->get();

            // Calculer le nombre de messages non lus pour chaque formateur
            $formateurs->each(function ($formateur) use ($user) {

                $formateur->messages_non_lus = Message::where('apprenant_id', $user->id)
                    ->where('formateur_id', $formateur->id)
                    ->where('expediteur_id', '!=', $user->id)
                    ->where('lu', false)
                    ->count();
            });

            $formateur = null;
            $messages = collect();

            // Un formateur a été sélectionné
            if ($id) {

                /*
                 * On récupère uniquement un formateur
                 * qui possède au moins une formation
                 * à laquelle l'apprenant est inscrit.
                 */
                $formateur = Formateur::whereHas(
                    'formations.inscriptions',
                    function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    }
                )
                ->with('user')
                ->findOrFail($id);

                // Récupération des messages
                $messages = Message::where('apprenant_id', $user->id)
                    ->where('formateur_id', $formateur->id)
                    ->with('expediteur')
                    ->orderBy('created_at', 'asc')
                    ->get();

                /*
                 * Marquer comme lus les messages
                 * envoyés par le formateur.
                 */
                Message::where('apprenant_id', $user->id)
                    ->where('formateur_id', $formateur->id)
                    ->where('expediteur_id', '!=', $user->id)
                    ->where('lu', false)
                    ->update([
                        'lu' => true
                    ]);
            }

            return view('messages.apprenant', compact(
                'formateurs',
                'formateur',
                'messages'
            ));
        }


        /*
        |--------------------------------------------------------------------------
        | FORMATEUR
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'formateur') {

            $formateur = $user->formateur;

            if (!$formateur) {
                abort(403, 'Profil formateur introuvable.');
            }

            // Apprenants inscrits à au moins une formation de ce formateur
            $apprenants = User::whereHas(
                'inscriptions.formation',
                function ($query) use ($formateur) {
                    $query->where('formateur_id', $formateur->id);
                }
            )
            ->where('role', 'apprenant')
            ->get();

            // Calculer le nombre de messages non lus pour chaque apprenant
            $apprenants->each(function ($apprenant) use ($formateur) {

                $apprenant->messages_non_lus = Message::where('formateur_id', $formateur->id)
                    ->where('apprenant_id', $apprenant->id)
                    ->where('expediteur_id', '!=', $formateur->user_id)
                    ->where('lu', false)
                    ->count();
            });

            $apprenant = null;
            $messages = collect();

            // Un apprenant a été sélectionné
            if ($id) {

                /*
                 * On récupère uniquement un apprenant
                 * inscrit à une formation du formateur connecté.
                 */
                $apprenant = User::whereHas(
                    'inscriptions.formation',
                    function ($query) use ($formateur) {
                        $query->where('formateur_id', $formateur->id);
                    }
                )
                ->where('role', 'apprenant')
                ->findOrFail($id);

                // Récupération des messages
                $messages = Message::where('formateur_id', $formateur->id)
                    ->where('apprenant_id', $apprenant->id)
                    ->with('expediteur')
                    ->orderBy('created_at', 'asc')
                    ->get();

                /*
                 * Marquer comme lus les messages
                 * envoyés par l'apprenant.
                 */
                Message::where('formateur_id', $formateur->id)
                    ->where('apprenant_id', $apprenant->id)
                    ->where('expediteur_id', '!=', $user->id)
                    ->where('lu', false)
                    ->update([
                        'lu' => true
                    ]);
            }

            return view('messages.formateur', compact(
                'apprenants',
                'apprenant',
                'messages'
            ));
        }


        abort(403);
    }


    /**
     * Envoyer un message.
     */
    public function envoyer(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
            'apprenant_id' => 'required|exists:users,id',
            'formateur_id' => 'required|exists:formateurs,id',
        ]);

        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | APPRENANT
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'apprenant') {

            // L'apprenant doit envoyer en son propre nom
            if ($request->apprenant_id != $user->id) {
                abort(403);
            }

            /*
             * Vérifier que le formateur possède
             * au moins une formation à laquelle
             * l'apprenant est inscrit.
             */
            $relationExiste = Formateur::where('id', $request->formateur_id)
                ->whereHas(
                    'formations.inscriptions',
                    function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    }
                )
                ->exists();

            if (!$relationExiste) {
                abort(
                    403,
                    'Vous ne pouvez pas contacter ce formateur.'
                );
            }

            Message::create([
                'apprenant_id' => $user->id,
                'formateur_id' => $request->formateur_id,
                'expediteur_id' => $user->id,
                'message' => $request->message,
                'lu' => false,
            ]);

            return back()->with(
                'success',
                'Message envoyé avec succès.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FORMATEUR
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'formateur') {

            $formateur = $user->formateur;

            if (!$formateur) {
                abort(403, 'Profil formateur introuvable.');
            }

            // Vérifier que le formateur envoyé
            // correspond au formateur connecté
            if ($request->formateur_id != $formateur->id) {
                abort(403);
            }

            /*
             * Vérifier que l'apprenant est réellement
             * inscrit à une formation de ce formateur.
             */
            $relationExiste = User::where('id', $request->apprenant_id)
                ->where('role', 'apprenant')
                ->whereHas(
                    'inscriptions.formation',
                    function ($query) use ($formateur) {
                        $query->where('formateur_id', $formateur->id);
                    }
                )
                ->exists();

            if (!$relationExiste) {
                abort(
                    403,
                    'Vous ne pouvez pas contacter cet apprenant.'
                );
            }

            Message::create([
                'apprenant_id' => $request->apprenant_id,
                'formateur_id' => $formateur->id,
                'expediteur_id' => $user->id,
                'message' => $request->message,
                'lu' => false,
            ]);

            return back()->with(
                'success',
                'Message envoyé avec succès.'
            );
        }


        abort(403);
    }
}