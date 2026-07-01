<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {   // Récupère toutes les formations (ou filtrez selon vos besoins, par exemple avec ->latest()->get())
        $formations = Formation::with('formateur')->get(); 

        // On transmet la variable $formations à la vue
        return view('Accueil.index', compact('formations'));
        
    }

    public function about()
    {
        return view('Accueil.about');
    }

    public function home2()
    {
        return view('Accueil.home2');
    }

    public function formations()
    {
        // Récupère toutes les formations (ou filtrez selon vos besoins, par exemple avec ->latest()->get())
        $formations = Formation::with('formateur')->get(); 

        // On transmet la variable $formations à la vue
        return view('Accueil.formations', compact('formations'));
    }
    



    public function sign_upApprenant()
    {
        return view('Accueil.sign_up.apprenant');
    }

    public function sign_upFormateur()
    {
        return view('Accueil.sign_up.formateur');
    }
}
