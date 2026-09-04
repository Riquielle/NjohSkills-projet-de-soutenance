@extends('admin.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Profil du formateur - SkillOra')

@section('content')

{{-- =====================================================
     EN-TÊTE
===================================================== --}}

<div class="d-flex flex-column flex-md-row justify-content-between
            align-items-start align-items-md-center gap-3 mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Profil du formateur
        </h2>

        <p class="text-muted mb-0">
            Consultez les informations et les activités du formateur.
        </p>

    </div>

    <a
        href="{{ route('admin.formateurs.index') }}"
        class="btn btn-outline-secondary"
    >

        <i class="fas fa-arrow-left me-2"></i>

        Retour

    </a>

</div>


{{-- =====================================================
     INFORMATIONS DU FORMATEUR
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body p-3 p-md-4">

        <div class="row align-items-center">

            {{-- PHOTO / INITIAL --}}

            <div class="col-12 col-md-2 text-center mb-3 mb-md-0">

                <div
                    class="rounded-circle bg-primary text-white
                           d-flex align-items-center justify-content-center mx-auto"
                    style="
                        width:90px;
                        height:90px;
                        font-size:36px;
                    "
                >

                    {{ strtoupper(
                        substr($formateur->user->name, 0, 1)
                    ) }}

                </div>

            </div>


            {{-- INFORMATIONS PRINCIPALES --}}

            <div class="col-12 col-md-7 text-center text-md-start">

                <h3 class="fw-bold mb-2">

                    {{ $formateur->user->name }}

                </h3>

                <p class="text-muted mb-2 text-break">

                    <i class="fas fa-envelope me-2"></i>

                    {{ $formateur->user->email }}

                </p>

                <p class="mb-0">

                    <i class="fas fa-graduation-cap me-2 text-primary"></i>

                    {{ $formateur->specialite }}

                </p>

            </div>


            {{-- STATUT --}}

            <div class="col-12 col-md-3 text-center text-md-end mt-3 mt-md-0">

                @if($formateur->user->actif)

                    <span class="badge bg-success fs-6 p-2">

                        <i class="fas fa-check-circle me-1"></i>

                        Compte actif

                    </span>

                @else

                    <span class="badge bg-danger fs-6 p-2">

                        <i class="fas fa-times-circle me-1"></i>

                        Compte désactivé

                    </span>

                @endif

            </div>

        </div>

    </div>

</div>



{{-- =====================================================
     INFORMATIONS PROFESSIONNELLES
===================================================== --}}

<div class="row g-3 g-md-4 mb-4">


    {{-- TELEPHONE --}}

    <div class="col-12 col-md-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-3 p-md-4">

                <div class="d-flex align-items-center mb-3">

                    <div
                        class="bg-primary bg-opacity-10 rounded-circle
                               p-3 me-3 flex-shrink-0"
                    >

                        <i class="fas fa-phone text-primary"></i>

                    </div>

                    <h6 class="fw-bold mb-0">
                        Téléphone
                    </h6>

                </div>

                <p class="mb-0 text-muted text-break">

                    {{ $formateur->telephone }}

                </p>

            </div>

        </div>

    </div>


    {{-- EXPERIENCE --}}

    <div class="col-12 col-md-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-3 p-md-4">

                <div class="d-flex align-items-center mb-3">

                    <div
                        class="bg-warning bg-opacity-10 rounded-circle
                               p-3 me-3 flex-shrink-0"
                    >

                        <i class="fas fa-briefcase text-warning"></i>

                    </div>

                    <h6 class="fw-bold mb-0">
                        Expérience
                    </h6>

                </div>

                <p class="mb-0 text-muted">

                    {{ $formateur->experience }}

                </p>

            </div>

        </div>

    </div>


    {{-- FORMATIONS --}}

    <div class="col-12 col-md-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-3 p-md-4">

                <div class="d-flex align-items-center mb-3">

                    <div
                        class="bg-success bg-opacity-10 rounded-circle
                               p-3 me-3 flex-shrink-0"
                    >

                        <i class="fas fa-book text-success"></i>

                    </div>

                    <h6 class="fw-bold mb-0">
                        Formations
                    </h6>

                </div>

                <h3 class="fw-bold mb-0">

                    {{ $formateur->formations->count() }}

                </h3>

            </div>

        </div>

    </div>

</div>



{{-- =====================================================
     BIOGRAPHIE
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body p-3 p-md-4">

        <h5 class="fw-bold mb-3">

            <i class="fas fa-user me-2 text-primary"></i>

            Biographie

        </h5>

        <p class="text-muted mb-0" style="line-height:1.7;">

            {{ $formateur->biographie }}

        </p>

    </div>

</div>



{{-- =====================================================
     FORMATIONS DU FORMATEUR
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 p-3 p-md-4">

        <h5 class="fw-bold mb-1">

            <i class="fas fa-book-open me-2 text-primary"></i>

            Formations proposées

        </h5>

        <p class="text-muted mb-0">

            Formations créées par ce formateur et apprenants inscrits.

        </p>

    </div>


    <div class="card-body p-3 p-md-4">

        @forelse($formateur->formations as $formation)

            <div class="card border rounded-4 mb-4">

                <div class="card-body p-3 p-md-4">


                    {{-- INFORMATIONS FORMATION --}}

                    <div class="d-flex flex-column flex-md-row
                                justify-content-between
                                align-items-start gap-3">

                        <div class="w-100">

                            <h5 class="fw-bold mb-2">

                                {{ $formation->titre }}

                            </h5>

                            <p class="text-muted mb-2">

                                {{ Str::limit(
                                    $formation->description,
                                    150
                                ) }}

                            </p>

                        </div>


                        {{-- STATUT FORMATION --}}

                        <div class="flex-shrink-0">

                            @if($formation->statut == 'publie')

                                <span class="badge bg-success">

                                    Publiée

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Brouillon

                                </span>

                            @endif

                        </div>

                    </div>


                    <hr>


                    {{-- STATISTIQUES --}}

                    <div class="row g-3 text-center">

                        <div class="col-12 col-sm-4">

                            <div class="p-2">

                                <small class="text-muted d-block mb-1">
                                    Prix
                                </small>

                                <strong>

                                    {{ number_format(
                                        $formation->prix,
                                        0,
                                        ',',
                                        ' '
                                    ) }}

                                    FCFA

                                </strong>

                            </div>

                        </div>


                        <div class="col-12 col-sm-4">

                            <div class="p-2">

                                <small class="text-muted d-block mb-1">
                                    Durée
                                </small>

                                <strong>

                                    {{ $formation->duree }}

                                </strong>

                            </div>

                        </div>


                        <div class="col-12 col-sm-4">

                            <div class="p-2">

                                <small class="text-muted d-block mb-1">
                                    Apprenants
                                </small>

                                <strong class="text-primary">

                                    {{ $formation->inscriptions
                                        ->where('statut', 'valide')
                                        ->count()
                                    }}

                                </strong>

                                inscrits

                            </div>

                        </div>

                    </div>


                    {{-- LISTE DES APPRENANTS --}}

                    @if(
                        $formation->inscriptions
                        ->where('statut', 'valide')
                        ->count() > 0
                    )

                        <hr class="my-4">

                        <h6 class="fw-bold mb-3">

                            <i class="fas fa-users me-2 text-primary"></i>

                            Apprenants inscrits

                        </h6>


                        {{-- 
                            Le tableau reste dans un conteneur
                            scrollable sur téléphone.
                        --}}

                        <div class="table-responsive">

                            <table
                                class="table table-hover align-middle mb-0"
                                style="min-width:700px;"
                            >

                                <thead class="table-light">

                                    <tr>

                                        <th>
                                            Apprenant
                                        </th>

                                        <th>
                                            Email
                                        </th>

                                        <th>
                                            Progression
                                        </th>

                                        <th>
                                            Statut
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach(
                                        $formation->inscriptions
                                        ->where('statut', 'valide')
                                        as $inscription
                                    )

                                        <tr>

                                            <td>

                                                <div
                                                    class="d-flex align-items-center"
                                                >

                                                    <div
                                                        class="rounded-circle
                                                               bg-primary
                                                               text-white
                                                               d-flex
                                                               align-items-center
                                                               justify-content-center
                                                               me-2
                                                               flex-shrink-0"
                                                        style="
                                                            width:36px;
                                                            height:36px;
                                                        "
                                                    >

                                                        {{ strtoupper(
                                                            substr(
                                                                $inscription->user->name,
                                                                0,
                                                                1
                                                            )
                                                        ) }}

                                                    </div>

                                                    <strong>

                                                        {{ $inscription->user->name }}

                                                    </strong>

                                                </div>

                                            </td>


                                            <td>

                                                {{ $inscription->user->email }}

                                            </td>


                                            <td style="min-width:180px;">

                                                <div
                                                    class="progress"
                                                    style="height:20px;"
                                                >

                                                    <div
                                                        class="progress-bar"
                                                        style="
                                                            width:{{ $inscription->progression }}%;
                                                        "
                                                    >

                                                        {{ $inscription->progression }}%

                                                    </div>

                                                </div>

                                            </td>


                                            <td>

                                                @if(
                                                    $inscription->progression >= 100
                                                )

                                                    <span
                                                        class="badge bg-success"
                                                    >

                                                        Terminée

                                                    </span>

                                                @else

                                                    <span
                                                        class="badge bg-primary"
                                                    >

                                                        En cours

                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div
                            class="alert alert-light border
                                   mt-3 mb-0"
                        >

                            <i class="fas fa-info-circle me-2"></i>

                            Aucun apprenant inscrit à cette formation.

                        </div>

                    @endif

                </div>

            </div>

        @empty

            <div class="text-center py-5">

                <i class="fas fa-book-open fa-3x text-muted mb-3"></i>

                <h5>
                    Aucune formation
                </h5>

                <p class="text-muted">
                    Ce formateur n'a encore créé aucune formation.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection