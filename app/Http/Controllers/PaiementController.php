<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\paiement;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function paiement($id)
    {
        $formation = Formation::with('formateur')->findOrFail($id);

        return view('paiement', compact('formation'));
    }

// Cette méthode intercepte le formulaire POST de votre vue
    public function store(Request $request, $id)
    {
        // 1. Validation de la méthode (Orange Money, Mobile Money, Carte Bancaire)
        $request->validate([
            'methode' => 'required|string|in:Orange Money,Mobile Money,Carte Bancaire'
        ]);

        $formation = Formation::findOrFail($id);
        $user = auth()->user();

        // 2. Sécurité : Vérifier si déjà inscrit
        $dejaInscrit = Inscription::where('user_id', $user->id)
            ->where('formation_id', $formation->id)
            ->where('statut', 'valide')
            ->exists();

        if ($dejaInscrit) {
            return redirect()->route('details_formations', $id)->with('info', 'Vous êtes déjà inscrit à cette formation !');
        }

        // 3. Simulation du paiement réussi et insertion en BDD
        $paiementReussi = true; 

        if ($paiementReussi) {
            
            // Étape A : Création de l'inscription
            
            $dateDebut = now();

            $dateFin = $dateDebut->copy()->addDays($formation->duree);

            Inscription::create([
                'user_id' => $user->id,
                'formation_id' => $formation->id,
                'statut' => 'valide',
                'progression' => 0,
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin,
                'prolongee' => false,
            ]);

            // Étape B : Création du paiement avec vos colonnes exactes (statut -> paye)
            Paiement::create([
                'formation_id' => $formation->id,
                'user_id'      => $user->id,
                'montant'      => $formation->prix,
                'methode'      => $request->methode, 
                'reference'    => 'REF-' . strtoupper(Str::random(12)), 
                'statut'       => 'paye' // On utilise bien 'paye' comme prévu dans votre ENUM !
            ]);

            return redirect()->route('ma_formation', $formation->id)->with('success', 'Félicitations ! Votre paiement via ' . $request->methode . ' a été validé, cliquer sur commencer pour débuter.');
        }

        return redirect()->back()->with('error', 'Le paiement a échoué.');
    }



    public function prolonger($id)
    {
        $inscription = Inscription::findOrFail($id);

        // Vérifier que la formation n'est pas déjà terminée
        if ($inscription->progression >= 100) {

            return back()->with(
                'error',
                'Cette formation est déjà terminée.'
            );
        }

        // Vérifier que la prolongation n'a pas déjà été utilisée
        if ($inscription->prolongee) {

            return back()->with(
                'error',
                'La prolongation a déjà été utilisée.'
            );
        }

        // Ajouter automatiquement 7 jours
        $inscription->date_fin = $inscription->date_fin->copy()->addDays(7);

        // Marquer la prolongation comme utilisée
        $inscription->prolongee = true;

        $inscription->save();

        return back()->with(
            'success',
            'Votre formation a été prolongée de 7 jours.'
        );
    }
}
