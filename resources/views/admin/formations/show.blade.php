@extends('admin.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Détail de la formation - SkillOra')

@section('content')

{{-- =====================================================
     EN-TÊTE
===================================================== --}}

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Détail de la formation
        </h2>

        <p class="text-muted mb-0">
            Consultez les informations et le contenu de cette formation.
        </p>
    </div>

    <a href="{{ route('admin.formations.index') }}"
       class="btn btn-outline-secondary">

        <i class="fas fa-arrow-left me-2"></i>
        Retour
    </a>

</div>


{{-- =====================================================
     INFORMATIONS PRINCIPALES
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="row g-0">

        {{-- IMAGE --}}

        <div class="col-lg-4">

            @if($formation->image)

                <img
                    src="{{ asset('storage/'.$formation->image) }}"
                    class="img-fluid w-100 h-100 rounded-start"
                    style="min-height:280px; object-fit:cover;"
                    alt="{{ $formation->titre }}">

            @else

                <div
                    class="bg-light d-flex align-items-center justify-content-center h-100"
                    style="min-height:280px;">

                    <i class="fas fa-book-open fa-4x text-muted"></i>

                </div>

            @endif

        </div>


        {{-- INFORMATIONS --}}

        <div class="col-lg-8">

            <div class="card-body p-4">

                <div class="d-flex flex-wrap justify-content-between align-items-start gap-2">

                    <h3 class="fw-bold mb-0">
                        {{ $formation->titre }}
                    </h3>

                    @if($formation->statut == 'publie')

                        <span class="badge bg-success fs-6">
                            <i class="fas fa-check-circle me-1"></i>
                            Publiée
                        </span>

                    @else

                        <span class="badge bg-secondary fs-6">
                            <i class="fas fa-file me-1"></i>
                            Brouillon
                        </span>

                    @endif

                </div>


                <hr>


                <p class="text-muted">

                    {{ $formation->description }}

                </p>


                <div class="row g-3 mt-2">

                    <div class="col-6 col-md-3">

                        <small class="text-muted d-block">
                            Prix
                        </small>

                        <strong>
                            {{ number_format($formation->prix, 0, ',', ' ') }}
                            FCFA
                        </strong>

                    </div>


                    <div class="col-6 col-md-3">

                        <small class="text-muted d-block">
                            Durée
                        </small>

                        <strong>
                            {{ $formation->duree }}
                        </strong>

                    </div>


                    <div class="col-6 col-md-3">

                        <small class="text-muted d-block">
                            Modules
                        </small>

                        <strong>
                            {{ $formation->modules->count() }}
                        </strong>

                    </div>


                    <div class="col-6 col-md-3">

                        <small class="text-muted d-block">
                            Apprenants
                        </small>

                        <strong class="text-primary">
                            {{ $formation->inscriptions->where('statut', 'valide')->count() }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =====================================================
     FORMATEUR
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body p-4">

        <h5 class="fw-bold mb-3">

            <i class="fas fa-chalkboard-teacher text-primary me-2"></i>

            Formateur

        </h5>


        @if($formation->formateur)

            <div class="d-flex align-items-center flex-wrap gap-3">

                <div
                    class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                    style="width:55px;height:55px;font-size:22px;">

                    {{ strtoupper(
                        substr($formation->formateur->user->name, 0, 1)
                    ) }}

                </div>


                <div>

                    <h6 class="fw-bold mb-1">

                        {{ $formation->formateur->user->name }}

                    </h6>

                    <p class="text-muted mb-0">

                        <i class="fas fa-envelope me-1"></i>

                        {{ $formation->formateur->user->email }}

                    </p>

                </div>

            </div>

        @else

            <p class="text-muted mb-0">
                Aucun formateur associé.
            </p>

        @endif

    </div>

</div>


{{-- =====================================================
     CONTENU DE LA FORMATION
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-header bg-white border-0 p-4">

        <h5 class="fw-bold mb-1">

            <i class="fas fa-layer-group text-primary me-2"></i>

            Contenu de la formation

        </h5>

        <p class="text-muted mb-0">

            Modules, leçons et quiz disponibles.

        </p>

    </div>


    <div class="card-body p-4">

        @forelse($formation->modules as $index => $module)

            <div class="card border rounded-4 mb-3">

                <div class="card-body">

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                        <h5 class="fw-bold mb-0">

                            Module {{ $index + 1 }} :
                            {{ $module->titre }}

                        </h5>

                        <span class="badge bg-primary">

                            {{ $module->lecons->count() }} leçon(s)

                        </span>

                    </div>


                    @if($module->description)

                        <p class="text-muted mt-2 mb-3">

                            {{ $module->description }}

                        </p>

                    @endif


                    <hr>


                    {{-- LEÇONS --}}

                    <h6 class="fw-bold mb-3">

                        <i class="fas fa-book-open text-primary me-2"></i>

                        Leçons

                    </h6>


                    @forelse($module->lecons as $lecon)

                        <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom py-2 gap-2">

                            <div>

                                <i class="fas fa-file-alt text-muted me-2"></i>

                                {{ $lecon->titre }}

                            </div>

                            <span class="badge bg-light text-dark border">

                                {{ $lecon->ressources->count() }}
                                ressource(s)

                            </span>

                        </div>

                    @empty

                        <p class="text-muted">
                            Aucune leçon dans ce module.
                        </p>

                    @endforelse


                    {{-- QUIZ --}}

                    <div class="mt-4">

                        <h6 class="fw-bold mb-2">

                            <i class="fas fa-question-circle text-warning me-2"></i>

                            Quiz

                        </h6>


                        @if($module->quiz)

                            <span class="badge bg-success">

                                Quiz disponible

                            </span>

                            <span class="text-muted ms-2">

                                {{ $module->quiz->questions->count() }}
                                question(s)

                            </span>

                        @else

                            <span class="badge bg-secondary">

                                Aucun quiz

                            </span>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="text-center py-5">

                <i class="fas fa-layer-group fa-3x text-muted mb-3"></i>

                <h5>
                    Aucun module
                </h5>

                <p class="text-muted mb-0">

                    Cette formation ne contient encore aucun module.

                </p>

            </div>

        @endforelse

    </div>

</div>


{{-- =====================================================
     APPRENANTS
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <h5 class="fw-bold mb-1">

            <i class="fas fa-users text-primary me-2"></i>

            Apprenants inscrits

        </h5>

        <p class="text-muted mb-0">

            Liste des apprenants actuellement inscrits à cette formation.

        </p>

    </div>


    <div class="card-body p-0">

        @php

            $inscriptionsValides = $formation->inscriptions
                ->where('statut', 'valide');

        @endphp


        @if($inscriptionsValides->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
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

                        @foreach($inscriptionsValides as $inscription)

                            <tr>

                                <td class="px-4">

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 flex-shrink-0"
                                            style="width:40px;height:40px;">

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

                                    <div class="progress"
                                         style="height:20px;">

                                        <div
                                            class="progress-bar"
                                            role="progressbar"
                                            style="width:{{ $inscription->progression }}%;">

                                            {{ $inscription->progression }}%

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    @if($inscription->progression >= 100)

                                        <span class="badge bg-success">

                                            Terminée

                                        </span>

                                    @else

                                        <span class="badge bg-primary">

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

            <div class="text-center py-5">

                <i class="fas fa-users-slash fa-3x text-muted mb-3"></i>

                <h5>
                    Aucun apprenant inscrit
                </h5>

                <p class="text-muted mb-0">

                    Aucun apprenant n'est actuellement inscrit à cette formation.

                </p>

            </div>

        @endif

    </div>

</div>

@endsection