<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\Paiement;
use Illuminate\Support\Facades\DB;

class AdminStatistiqueController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | PÉRIODE SÉLECTIONNÉE
        |--------------------------------------------------------------------------
        */

        $periode = request('periode', 'annee');


        /*
        |--------------------------------------------------------------------------
        | STATISTIQUES GÉNÉRALES
        |--------------------------------------------------------------------------
        */

        $totalApprenants = User::where('role', 'apprenant')->count();

        $totalFormateurs = User::where('role', 'formateur')->count();

        $totalFormations = Formation::count();

        $totalInscriptions = Inscription::count();

        $revenus = Paiement::where('statut', 'paye')
            ->sum('montant');


        /*
        |--------------------------------------------------------------------------
        | VARIABLES POUR LES GRAPHIQUES
        |--------------------------------------------------------------------------
        */

        $labels = [];

        $inscriptionsData = [];

        $revenusData = [];


        /*
        |--------------------------------------------------------------------------
        | 30 DERNIERS JOURS
        |--------------------------------------------------------------------------
        */

        if ($periode === '30jours') {

            $debut = now()
                ->subDays(29)
                ->startOfDay();

            $fin = now()
                ->endOfDay();


            for ($date = $debut->copy();
                $date->lte($fin);
                $date->addDay()) {

                $jour = $date->copy();


                $labels[] = $jour->format('d/m');


                $inscriptionsData[] = Inscription::whereDate(
                    'created_at',
                    $jour->toDateString()
                )->count();


                $revenusData[] = Paiement::where(
                    'statut',
                    'paye'
                )
                ->whereDate(
                    'created_at',
                    $jour->toDateString()
                )
                ->sum('montant');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | 6 DERNIERS MOIS
        |--------------------------------------------------------------------------
        */

        elseif ($periode === '6mois') {

            $debut = now()
                ->subMonths(5)
                ->startOfMonth();


            for ($i = 0; $i < 6; $i++) {

                $mois = $debut->copy()->addMonths($i);


                $labels[] = $mois->translatedFormat('F Y');


                $inscriptionsData[] = Inscription::whereYear(
                    'created_at',
                    $mois->year
                )
                ->whereMonth(
                    'created_at',
                    $mois->month
                )
                ->count();


                $revenusData[] = Paiement::where(
                    'statut',
                    'paye'
                )
                ->whereYear(
                    'created_at',
                    $mois->year
                )
                ->whereMonth(
                    'created_at',
                    $mois->month
                )
                ->sum('montant');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | CETTE ANNÉE
        |--------------------------------------------------------------------------
        */

        else {

            $annee = now()->year;


            for ($mois = 1; $mois <= 12; $mois++) {

                $labels[] = \Carbon\Carbon::create(
                    $annee,
                    $mois,
                    1
                )->translatedFormat('F');


                $inscriptionsData[] = Inscription::whereYear(
                    'created_at',
                    $annee
                )
                ->whereMonth(
                    'created_at',
                    $mois
                )
                ->count();


                $revenusData[] = Paiement::where(
                    'statut',
                    'paye'
                )
                ->whereYear(
                    'created_at',
                    $annee
                )
                ->whereMonth(
                    'created_at',
                    $mois
                )
                ->sum('montant');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | FORMATIONS PAR STATUT
        |--------------------------------------------------------------------------
        */

        $formationsPubliees = Formation::where(
            'statut',
            'publie'
        )->count();


        $formationsBrouillons = Formation::where(
            'statut',
            'brouillon'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PAIEMENTS PAR STATUT
        |--------------------------------------------------------------------------
        */

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


        


        /*
        |--------------------------------------------------------------------------
        | VUE
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.statistiques.index',
            compact(
                'totalApprenants',
                'totalFormateurs',
                'totalFormations',
                'totalInscriptions',
                'revenus',

                'formationsPubliees',
                'formationsBrouillons',

                'paiementsPayes',
                'paiementsAttente',
                'paiementsEchec',

                'periode',

                'labels',
                'inscriptionsData',
                'revenusData'
            )
        );
    }
}