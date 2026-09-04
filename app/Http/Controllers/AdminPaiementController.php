<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class AdminPaiementController extends Controller
{
    /**
     * Liste des paiements
     */
    public function index(Request $request)
    {
        $query = Paiement::with([
            'apprenant',
            'formation'
        ]);

        /*
        |--------------------------------------------------------------------------
        | RECHERCHE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('reference', 'like', "%{$search}%")

                  ->orWhereHas('apprenant', function ($userQuery) use ($search) {

                      $userQuery
                          ->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");

                  })

                  ->orWhereHas('formation', function ($formationQuery) use ($search) {

                      $formationQuery
                          ->where('titre', 'like', "%{$search}%");

                  });

            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTRE PAR STATUT
        |--------------------------------------------------------------------------
        */

        if ($request->filled('statut')) {

            $query->where(
                'statut',
                $request->statut
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $paiements = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | STATISTIQUES
        |--------------------------------------------------------------------------
        */

        $totalPaiements = Paiement::count();

        $paiementsPayes = Paiement::where(
            'statut',
            'paye'
        )->count();

        $paiementsAttente = Paiement::where(
            'statut',
            'en_attente'
        )->count();

        $paiementsEchec = Paiement::where(
            'statut',
            'echec'
        )->count();

        $revenus = Paiement::where(
            'statut',
            'paye'
        )->sum('montant');


        return view(
            'admin.paiements.index',
            compact(
                'paiements',
                'totalPaiements',
                'paiementsPayes',
                'paiementsAttente',
                'paiementsEchec',
                'revenus'
            )
        );
    }


    /**
     * Voir le détail d'un paiement
     */
    public function show(Paiement $paiement)
    {
        $paiement->load([
            'apprenant',
            'formation'
        ]);

        return view(
            'admin.paiements.show',
            compact('paiement')
        );
    }


    /**
     * Valider manuellement un paiement
     */
    public function valider(Paiement $paiement)
    {
        $paiement->statut = 'paye';

        $paiement->save();

        return back()->with(
            'success',
            'Le paiement a été validé avec succès.'
        );
    }


    /**
     * Marquer un paiement comme échoué
     */
    public function echouer(Paiement $paiement)
    {
        $paiement->statut = 'echec';

        $paiement->save();

        return back()->with(
            'success',
            'Le paiement a été marqué comme échoué.'
        );
    }
}