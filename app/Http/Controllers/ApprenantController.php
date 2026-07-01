<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprenantController extends Controller
{
    public function ma_Formation($id)
{
    $formation = Formation::with('formateur')->findOrFail($id);

    // Vérifier que l'utilisateur est inscrit
    $inscription = Inscription::where('formation_id', $id)
                    ->where('user_id', Auth::id())
                    ->where('statut', 'valide')
                    ->first();

    if (!$inscription) {

        return redirect()
                ->route('details_formations', $id)
                ->with('error', 'Vous devez être inscrit à cette formation.');

    }

    return view('ma_Formation', compact('formation', 'inscription'));
}
}
