<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;

class DashboardapController extends Controller
{
    public function dashboard_ap(){
        $formations = Formation::with('formateur')
                    ->latest()
                    ->get();
        return view('dashboard_ap', compact('formations'));
    }

   

public function details_formations($id)
{
    // 1. On récupère la formation avec son formateur, ou on renvoie une erreur 404 si elle n'existe pas
    $formation = Formation::with('formateur')->findOrFail($id);

    
         $inscription = null;

        if (auth()->check()) {
            $inscription = Inscription::where('user_id', auth()->id())
                                    ->where('formation_id', $formation->id)
                                    ->first();
        }
    // 3. On envoie les DEUX variables à la vue
        return view('Accueil.details_formations', compact('formation', 'inscription'));
        }
   
}
