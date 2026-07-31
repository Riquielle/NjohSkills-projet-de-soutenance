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
            Inscription::create([
                'user_id' => $user->id,
                'formation_id' => $formation->id,
                'statut' => 'valide',
                'progression'  => 0,
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
}
