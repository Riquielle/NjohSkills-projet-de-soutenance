<?php

namespace App\Http\Controllers;

use App\Models\Inscription;

use Illuminate\Http\Request;

class AdminInscriptionController extends Controller
{
    /**
     * Afficher toutes les inscriptions
     */
    public function index(Request $request)
    {
        $query = Inscription::with([
            'user',
            'formation.formateur.user'
        ]);

        /*
        |--------------------------------------------------------------------------
        | RECHERCHE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                // Recherche sur l'apprenant
                $q->whereHas('user', function ($userQuery) use ($search) {

                    $userQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");

                })

                // Recherche sur la formation
                ->orWhereHas('formation', function ($formationQuery) use ($search) {

                    $formationQuery
                        ->where('titre', 'like', "%{$search}%");

                });

            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTRE STATUT
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

        $inscriptions = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | STATISTIQUES
        |--------------------------------------------------------------------------
        */

        $totalInscriptions = Inscription::count();

        $inscriptionsValides = Inscription::where(
            'statut',
            'valide'
        )->count();

        $inscriptionsEnAttente = Inscription::where(
            'statut',
            'en_attente'
        )->count();

        $inscriptionsTerminees = Inscription::where(
            'progression',
            100
        )->count();


        return view(
            'admin.inscriptions.index',
            compact(
                'inscriptions',
                'totalInscriptions',
                'inscriptionsValides',
                'inscriptionsEnAttente',
                'inscriptionsTerminees'
            )
        );
    }

    public function show(Inscription $inscription)
    {
        $inscription->load([
            'user',
            'formation.formateur.user',
            'formation.modules.lecons.ressources',
        ]);

        return view(
            'admin.inscriptions.show',
            compact('inscription')
        );
    }
}
