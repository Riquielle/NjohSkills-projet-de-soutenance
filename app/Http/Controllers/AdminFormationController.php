<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Notifications\FormationStatutNotification;

class AdminFormationController extends Controller
{
    /**
     * Liste des formations
     */
    public function index(Request $request)
    {
        $query = Formation::with('formateur.user')
            ->withCount([
                'inscriptions as apprenants_count' => function ($query) {
                    $query->where('statut', 'valide');
                }
            ]);

        // Recherche
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");

            });
        }

        // Filtre statut
        if ($request->filled('statut')) {

            $query->where('statut', $request->statut);

        }

        $formations = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.formations.index',
            compact('formations')
        );
    }


    /**
     * Voir une formation
     */
    

    public function show($id)
    {
        $formation = Formation::with([
            'formateur.user',
            'modules.lecons.ressources',
            'modules.quiz.questions',
            'inscriptions.user',
        ])->findOrFail($id);

        return view(
            'admin.formations.show',
            compact('formation')
        );
    }


    /**
 * Publier / dépublier
 */
public function toggleStatut($id)
{
    $formation = Formation::with('formateur.user')->findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | PUBLICATION
    |--------------------------------------------------------------------------
    */

    if ($formation->statut === 'publie') {

        $formation->statut = 'brouillon';

        $formation->save();

        /*
        |--------------------------------------------------------------------------
        | Notification au formateur
        |--------------------------------------------------------------------------
        */

        if ($formation->formateur && $formation->formateur->user) {

            $formation->formateur->user->notify(
                new FormationStatutNotification(
                    $formation,
                    'depublie'
                )
            );
        }

        return back()->with(
            'success',
            'La formation a été retirée de la publication.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PUBLICATION
    |--------------------------------------------------------------------------
    */

    $formation->statut = 'publie';

    $formation->save();


    /*
    |--------------------------------------------------------------------------
    | Notification au formateur
    |--------------------------------------------------------------------------
    */

    if ($formation->formateur && $formation->formateur->user) {

        $formation->formateur->user->notify(
            new FormationStatutNotification(
                $formation,
                'publie'
            )
        );
    }


    return back()->with(
        'success',
        'La formation a été publiée avec succès.'
    );
}


    /**
     * Supprimer une formation
     */
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);

        $formation->delete();

        return back()->with(
            'success',
            'La formation a été supprimée avec succès.'
        );
    }

    
}
