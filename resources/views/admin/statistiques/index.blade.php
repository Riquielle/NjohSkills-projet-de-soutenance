@extends('admin.layout')

@section('title', 'Statistiques - SkillOra')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         EN-TÊTE
    ====================================================== --}}

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Statistiques
        </h2>

        <p class="text-muted mb-0">
            Analysez les performances de votre plateforme.
        </p>

    </div>


        {{-- =====================================================
        FILTRE DE PÉRIODE
    ===================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form
                action="{{ route('admin.statistiques.index') }}"
                method="GET"
            >

                <div class="row align-items-center g-3">

                    <div class="col-12 col-md-4">

                        <div class="d-flex align-items-center">

                            <div
                                class="rounded-circle bg-primary bg-opacity-10 p-3 me-3"
                            >

                                <i class="fas fa-calendar-alt text-primary"></i>

                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Période d'analyse
                                </h6>

                                <small class="text-muted">
                                    Filtrer les statistiques
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-md-5">

                        <select
                            name="periode"
                            class="form-select"
                            onchange="this.form.submit()"
                        >

                            <option
                                value="30jours"
                                {{ $periode === '30jours' ? 'selected' : '' }}
                            >
                                30 derniers jours
                            </option>

                            <option
                                value="6mois"
                                {{ $periode === '6mois' ? 'selected' : '' }}
                            >
                                6 derniers mois
                            </option>

                            <option
                                value="annee"
                                {{ $periode === 'annee' ? 'selected' : '' }}
                            >
                                Cette année
                            </option>

                        </select>

                    </div>


                    <div class="col-12 col-md-3 text-md-end">

                        <span class="badge bg-primary p-2">

                            <i class="fas fa-filter me-1"></i>

                            @if($periode === '30jours')

                                30 derniers jours

                            @elseif($periode === '6mois')

                                6 derniers mois

                            @else

                                {{ now()->year }}

                            @endif

                        </span>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         CARTES STATISTIQUES
    ====================================================== --}}

    <div class="row g-4 mb-4">

        {{-- APPRENANTS --}}

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Apprenants
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalApprenants }}
                            </h3>

                        </div>

                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">

                            <i class="fas fa-users text-primary fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- FORMATEURS --}}

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Formateurs
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalFormateurs }}
                            </h3>

                        </div>

                        <div class="rounded-circle bg-success bg-opacity-10 p-3">

                            <i class="fas fa-chalkboard-teacher text-success fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- FORMATIONS --}}

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Formations
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalFormations }}
                            </h3>

                        </div>

                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">

                            <i class="fas fa-book text-warning fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- REVENUS --}}

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Revenus
                            </p>

                            <h3 class="fw-bold mb-0">

                                {{ number_format(
                                    $revenus,
                                    0,
                                    ',',
                                    ' '
                                ) }}

                                FCFA

                            </h3>

                        </div>

                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">

                            <i class="fas fa-money-bill-wave text-danger fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         GRAPHIQUES PRINCIPAUX
    ====================================================== --}}

    <div class="row g-4 mb-4">


        {{-- REVENUS --}}

        <div class="col-12 col-xl-8">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-1">
                        Évolution des revenus
                    </h5>

                    <p class="text-muted mb-0">
                        Revenus générés par les paiements validés.
                    </p>

                </div>

                <div class="card-body">

                    <div style="height:350px;">

                        <canvas id="revenusChart"></canvas>

                    </div>

                </div>

            </div>

        </div>


        {{-- FORMATIONS --}}

        <div class="col-12 col-xl-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-1">
                        Formations
                    </h5>

                    <p class="text-muted mb-0">
                        État des formations.
                    </p>

                </div>

                <div class="card-body">

                    <div style="height:300px;">

                        <canvas id="formationsChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         DEUXIÈME LIGNE
    ====================================================== --}}

    <div class="row g-4">


        {{-- INSCRIPTIONS --}}

        <div class="col-12 col-xl-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-1">
                        Évolution des inscriptions
                    </h5>

                    <p class="text-muted mb-0">
                        Nombre d'inscriptions durant l'année {{ now()->year }}.
                    </p>

                </div>

                <div class="card-body">

                    <div style="height:350px;">

                        <canvas id="inscriptionsChart"></canvas>

                    </div>

                </div>

            </div>

        </div>


        {{-- PAIEMENTS --}}

        <div class="col-12 col-xl-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-1">
                        Paiements
                    </h5>

                    <p class="text-muted mb-0">
                        État des transactions.
                    </p>

                </div>

                <div class="card-body">

                    <div style="height:300px;">

                        <canvas id="paiementsChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =====================================================
     CHART.JS
====================================================== --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        /*
        |--------------------------------------------------------------------------
        | DONNÉES
        |--------------------------------------------------------------------------
        */

        const labels = @json($labels);
        const revenus = @json($revenusData);
        const inscriptions = @json($inscriptionsData);


        /*
        |--------------------------------------------------------------------------
        | GRAPHIQUE REVENUS
        |--------------------------------------------------------------------------
        */

        const revenusCanvas = document.getElementById('revenusChart');

        if (revenusCanvas) {

            new Chart(revenusCanvas, {

                type: 'line',

                data: {
                    labels: labels,

                    datasets: [{
                        label: 'Revenus (FCFA)',
                        data: revenus,
                        tension: 0.4,
                        fill: true,
                        borderWidth: 3,
                        pointRadius: 4
                    }]
                },

                options: {

                    responsive: true,
                    maintainAspectRatio: false,

                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },

                    plugins: {

                        legend: {
                            display: true
                        },

                        tooltip: {

                            callbacks: {

                                label: function(context) {

                                    return ' ' +
                                        new Intl.NumberFormat('fr-FR')
                                            .format(context.raw) +
                                        ' FCFA';

                                }

                            }

                        }

                    },

                    scales: {

                        y: {

                            beginAtZero: true,

                            ticks: {

                                callback: function(value) {

                                    return new Intl.NumberFormat('fr-FR')
                                        .format(value) +
                                        ' FCFA';

                                }

                            }

                        }

                    }

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | GRAPHIQUE INSCRIPTIONS
        |--------------------------------------------------------------------------
        */

        const inscriptionsCanvas =
            document.getElementById('inscriptionsChart');

        if (inscriptionsCanvas) {

            new Chart(inscriptionsCanvas, {

                type: 'bar',

                data: {

                    labels: labels,

                    datasets: [{

                        label: 'Inscriptions',

                        data: inscriptions,

                        borderWidth: 1

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    plugins: {

                        legend: {
                            display: true
                        }

                    },

                    scales: {

                        y: {

                            beginAtZero: true,

                            ticks: {

                                precision: 0

                            }

                        }

                    }

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | GRAPHIQUE FORMATIONS
        |--------------------------------------------------------------------------
        */

        const formationsCanvas =
            document.getElementById('formationsChart');

        if (formationsCanvas) {

            new Chart(formationsCanvas, {

                type: 'doughnut',

                data: {

                    labels: [
                        'Publiées',
                        'Brouillons'
                    ],

                    datasets: [{

                        data: [
                            {{ $formationsPubliees }},
                            {{ $formationsBrouillons }}
                        ],

                        borderWidth: 0

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    plugins: {

                        legend: {

                            position: 'bottom'

                        }

                    }

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | GRAPHIQUE PAIEMENTS
        |--------------------------------------------------------------------------
        */

        const paiementsCanvas =
            document.getElementById('paiementsChart');

        if (paiementsCanvas) {

            new Chart(paiementsCanvas, {

                type: 'doughnut',

                data: {

                    labels: [
                        'Payés',
                        'En attente',
                        'Échecs'
                    ],

                    datasets: [{

                        data: [

                            {{ $paiementsPayes }},

                            {{ $paiementsAttente }},

                            {{ $paiementsEchec }}

                        ],

                        borderWidth: 0

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    plugins: {

                        legend: {

                            position: 'bottom'

                        }

                    }

                }

            });

        }

    });
    </script>
@endsection