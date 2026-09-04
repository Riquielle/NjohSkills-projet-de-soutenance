@extends('admin.layout')

@section('title', 'Détail de l\'inscription - SkillOra')

@section('content')

<div class="container-fluid px-0">

    {{-- EN-TÊTE --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Détail de l'inscription
            </h2>

            <p class="text-muted mb-0">
                Consultez les informations relatives à cette inscription.
            </p>

        </div>

        <a
            href="{{ route('admin.inscriptions.index') }}"
            class="btn btn-outline-secondary"
        >
            <i class="fas fa-arrow-left me-2"></i>
            Retour
        </a>

    </div>


    {{-- =====================================================
         APPRENANT
    ====================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="row align-items-center g-4">

                {{-- AVATAR --}}
                <div class="col-12 col-md-2 text-center">

                    <div
                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                        style="width:100px;height:100px;font-size:40px;"
                    >

                        {{ strtoupper(
                            substr(
                                $inscription->user->name ?? 'A',
                                0,
                                1
                            )
                        ) }}

                    </div>

                </div>


                {{-- INFORMATIONS --}}
                <div class="col-12 col-md-7 text-center text-md-start">

                    <h3 class="fw-bold">

                        {{ $inscription->user->name ?? 'Utilisateur supprimé' }}

                    </h3>

                    <p class="text-muted mb-1">

                        <i class="fas fa-envelope me-2"></i>

                        {{ $inscription->user->email ?? '—' }}

                    </p>

                    <p class="text-muted mb-0">

                        <i class="fas fa-calendar me-2"></i>

                        Inscrit le
                        {{ $inscription->created_at->format('d/m/Y') }}

                    </p>

                </div>


                {{-- STATUT --}}
                <div class="col-12 col-md-3 text-center text-md-end">

                    @if($inscription->statut === 'valide')

                        <span class="badge bg-success fs-6 p-2">
                            <i class="fas fa-check-circle me-1"></i>
                            Inscription valide
                        </span>

                    @elseif($inscription->statut === 'en_attente')

                        <span class="badge bg-warning text-dark fs-6 p-2">
                            <i class="fas fa-clock me-1"></i>
                            En attente
                        </span>

                    @else

                        <span class="badge bg-secondary fs-6 p-2">
                            {{ ucfirst($inscription->statut) }}
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         INFORMATIONS FORMATION
    ====================================================== --}}

    <div class="row g-4 mb-4">

        {{-- FORMATION --}}
        <div class="col-12 col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">

                        <i class="fas fa-book-open text-primary me-2"></i>

                        Formation suivie

                    </h5>


                    <h4 class="fw-bold">

                        {{ $inscription->formation->titre }}

                    </h4>


                    <p class="text-muted">

                        {{ $inscription->formation->description }}

                    </p>


                    <div class="row g-3 mt-3">

                        <div class="col-12 col-sm-6">

                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block">
                                    Prix
                                </small>

                                <strong>

                                    {{ number_format(
                                        $inscription->formation->prix,
                                        0,
                                        ',',
                                        ' '
                                    ) }}

                                    FCFA

                                </strong>

                            </div>

                        </div>


                        <div class="col-12 col-sm-6">

                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block">
                                    Durée
                                </small>

                                <strong>
                                    {{ $inscription->formation->duree }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- FORMATEUR --}}
        <div class="col-12 col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">

                        <i class="fas fa-chalkboard-teacher text-primary me-2"></i>

                        Formateur

                    </h5>

                    @if($inscription->formation->formateur)

                        <h5 class="fw-bold">

                            {{ $inscription->formation->formateur->user->name }}

                        </h5>

                        <p class="text-muted mb-0">

                            {{ $inscription->formation->formateur->specialite }}

                        </p>

                    @else

                        <p class="text-muted">
                            Aucun formateur associé.
                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PROGRESSION
    ====================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">

                <i class="fas fa-chart-line text-primary me-2"></i>

                Progression

            </h5>


            <div class="d-flex justify-content-between mb-2">

                <span>
                    Progression de la formation
                </span>

                <strong>
                    {{ $inscription->progression }}%
                </strong>

            </div>


            <div
                class="progress"
                style="height:25px;"
            >

                <div
                    class="progress-bar
                    @if($inscription->progression >= 100)
                        bg-success
                    @elseif($inscription->progression >= 50)
                        bg-warning
                    @else
                        bg-primary
                    @endif"
                    style="width: {{ $inscription->progression }}%;"
                >

                    {{ $inscription->progression }}%

                </div>

            </div>


            @if($inscription->progression >= 100)

                <div class="alert alert-success mt-4 mb-0">

                    <i class="fas fa-graduation-cap me-2"></i>

                    L'apprenant a terminé cette formation.

                </div>

            @else

                <div class="alert alert-info mt-4 mb-0">

                    <i class="fas fa-info-circle me-2"></i>

                    L'apprenant suit actuellement cette formation.

                </div>

            @endif

        </div>

    </div>


    {{-- =====================================================
         INFORMATIONS INSCRIPTION
    ====================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">

                <i class="fas fa-info-circle text-primary me-2"></i>

                Informations de l'inscription

            </h5>


            <div class="row g-4">

                <div class="col-12 col-md-4">

                    <small class="text-muted d-block">
                        Date d'inscription
                    </small>

                    <strong>
                        {{ $inscription->created_at->format('d/m/Y à H:i') }}
                    </strong>

                </div>


                <div class="col-12 col-md-4">

                    <small class="text-muted d-block">
                        Dernière modification
                    </small>

                    <strong>
                        {{ $inscription->updated_at->format('d/m/Y à H:i') }}
                    </strong>

                </div>


                <div class="col-12 col-md-4">

                    <small class="text-muted d-block">
                        Progression
                    </small>

                    <strong>
                        {{ $inscription->progression }}%
                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         MODULES
    ====================================================== --}}

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">

            <h5 class="fw-bold mb-1">

                <i class="fas fa-layer-group text-primary me-2"></i>

                Modules de la formation

            </h5>

            <p class="text-muted mb-0">
                Vue générale du contenu de la formation.
            </p>

        </div>


        <div class="card-body">

            @forelse(
                $inscription->formation->modules->sortBy('ordre')
                as $module
            )

                <div class="border rounded-4 p-3 mb-3">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <div>

                            <h6 class="fw-bold mb-1">

                                {{ $module->ordre }}.
                                {{ $module->titre }}

                            </h6>

                            <small class="text-muted">

                                {{ $module->lecons->count() }}
                                leçon(s)

                            </small>

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center py-4">

                    <i class="fas fa-book-open fa-2x text-muted mb-2"></i>

                    <p class="text-muted mb-0">

                        Aucun module disponible.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection