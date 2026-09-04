<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\Paiement;

class AdminController extends Controller
{
     public function dashboard()
    {
        $nombreApprenants = User::where(
            'role',
            'apprenant'
        )->count();

        $nombreFormateurs = User::where(
            'role',
            'formateur'
        )->count();

        $nombreFormations = Formation::count();

        $nombreInscriptions = Inscription::count();

        $nombrePaiements = Paiement::where(
            'statut',
            'paye'
        )->count();

        $revenus = Paiement::where(
            'statut',
            'paye'
        )->sum('montant');

        $formationsPubliees = Formation::where(
            'statut',
            'publie'
        )->count();

        $formationsBrouillon = Formation::where(
            'statut',
            'brouillon'
        )->count();

        return view('admin.dashboard', compact(
            'nombreApprenants',
            'nombreFormateurs',
            'nombreFormations',
            'nombreInscriptions',
            'nombrePaiements',
            'revenus',
            'formationsPubliees',
            'formationsBrouillon'
        ));
    }
}
