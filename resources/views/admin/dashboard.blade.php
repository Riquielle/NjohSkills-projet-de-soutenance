@extends('admin.layout')

@section('title', 'Tableau de bord - NjohSkills')


@section('content')

<div class="top-header bg-white rounded-4 shadow-sm p-4 mb-4">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h2 class="fw-bold mb-1">
                Tableau de bord
            </h2>

            <p class="text-muted mb-0">
                Bienvenue dans l'espace d'administration de SkillOra.
            </p>

        </div>


        <div class="text-end">

            <strong>
                {{ auth()->user()->name }}
            </strong>

            <br>

            <small class="text-muted">
                Administrateur
            </small>

        </div>

    </div>

</div>


{{-- STATISTIQUES --}}

<div class="row g-4">


    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <div class="fs-2 text-primary">

                <i class="fas fa-user-graduate"></i>

            </div>

            <small class="text-muted">
                Total apprenants
            </small>

            <h3 class="fw-bold">
                {{ $nombreApprenants }}
            </h3>

        </div>

    </div>


    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <div class="fs-2 text-success">

                <i class="fas fa-chalkboard-teacher"></i>

            </div>

            <small class="text-muted">
                Total formateurs
            </small>

            <h3 class="fw-bold">
                {{ $nombreFormateurs }}
            </h3>

        </div>

    </div>


    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <div class="fs-2 text-warning">

                <i class="fas fa-book-open"></i>

            </div>

            <small class="text-muted">
                Total formations
            </small>

            <h3 class="fw-bold">
                {{ $nombreFormations }}
            </h3>

        </div>

    </div>


    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <div class="fs-2 text-danger">

                <i class="fas fa-user-check"></i>

            </div>

            <small class="text-muted">
                Inscriptions
            </small>

            <h3 class="fw-bold">
                {{ $nombreInscriptions }}
            </h3>

        </div>

    </div>

</div>


{{-- REVENUS --}}

<div class="row g-4 mt-2">


    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 p-4">

            <h5 class="fw-bold">

                <i class="fas fa-wallet text-success me-2"></i>

                Revenus

            </h5>

            <h2 class="text-success fw-bold">

                {{ number_format($revenus, 0, ',', ' ') }} FCFA

            </h2>

            <p class="text-muted mb-0">

                Total des paiements validés

            </p>

        </div>

    </div>


    <div class="col-lg-6">

        <div class="card border-0 shadow-sm rounded-4 p-4">

            <h5 class="fw-bold">

                <i class="fas fa-book text-primary me-2"></i>

                Formations

            </h5>

            <p class="mb-2">

                <strong>
                    {{ $formationsPubliees }}
                </strong>

                formations publiées

            </p>

            <p class="mb-0">

                <strong>
                    {{ $formationsBrouillon }}
                </strong>

                formations en brouillon

            </p>

        </div>

    </div>

</div>

@endsection