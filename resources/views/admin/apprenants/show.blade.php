@extends('admin.layout')

@section('title', 'Profil de l’apprenant - SkillOra')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Profil de l’apprenant
        </h2>

        <p class="text-muted mb-0">
            Consultation des informations de l’apprenant.
        </p>
    </div>

    <a
        href="{{ route('admin.apprenants.index') }}"
        class="btn btn-outline-primary"
    >
        <i class="fas fa-arrow-left me-2"></i>
        Retour
    </a>

</div>


<div class="row g-4">

    {{-- PROFIL --}}
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 text-center">

            <div class="card-body py-5">

                <div
                    class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                    style="width:90px;height:90px;font-size:36px;"
                >
                    {{ strtoupper(substr($apprenant->name, 0, 1)) }}
                </div>

                <h4 class="fw-bold">
                    {{ $apprenant->name }}
                </h4>

                @if($apprenant->actif)

                    <span class="badge bg-success">
                        Compte actif
                    </span>

                @else

                    <span class="badge bg-danger">
                        Compte désactivé
                    </span>

                @endif

            </div>

        </div>

    </div>


    {{-- INFORMATIONS --}}
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <h5 class="fw-bold mb-4">
                    <i class="fas fa-user me-2 text-primary"></i>
                    Informations personnelles
                </h5>

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="text-muted small">
                            Nom complet
                        </label>

                        <p class="fw-semibold">
                            {{ $apprenant->name }}
                        </p>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Adresse e-mail
                        </label>

                        <p class="fw-semibold">
                            {{ $apprenant->email }}
                        </p>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Type de compte
                        </label>

                        <p class="fw-semibold">
                            Apprenant
                        </p>

                    </div>


                    <div class="col-md-6">

                        <label class="text-muted small">
                            Date d'inscription
                        </label>

                        <p class="fw-semibold">
                            {{ $apprenant->created_at->format('d/m/Y à H:i') }}
                        </p>

                    </div>

                </div>

                <hr class="my-4">


                <div class="alert alert-info mb-0">

                    <i class="fas fa-info-circle me-2"></i>

                    Les informations personnelles de cet apprenant sont
                    uniquement consultables par l'administration.
                    Elles ne peuvent pas être modifiées depuis cet espace.

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        FORMATIONS DE L'APPRENANT
    ===================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mt-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h5 class="fw-bold mb-1">
                        <i class="fas fa-graduation-cap text-primary me-2"></i>
                        Formations suivies
                    </h5>

                    <p class="text-muted mb-0">
                        Suivi des formations de cet apprenant.
                    </p>
                </div>

                <span class="badge bg-primary">
                    {{ $inscriptions->count() }} formation(s)
                </span>

            </div>


            @if($inscriptions->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>Formation</th>

                                <th>Progression</th>

                                <th>Début</th>

                                <th>Fin</th>

                                <th>Temps restant</th>

                                <th>Prolongation</th>

                                <th>Statut</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($inscriptions as $inscription)

                                <tr>

                                    {{-- FORMATION --}}
                                    <td>

                                        <div class="d-flex align-items-center">

                                            @if($inscription->formation->image)

                                                <img
                                                    src="{{ asset('storage/'.$inscription->formation->image) }}"
                                                    alt="{{ $inscription->formation->titre }}"
                                                    class="rounded-3 me-3"
                                                    style="width:60px;height:45px;object-fit:cover;"
                                                >

                                            @else

                                                <div
                                                    class="bg-light rounded-3 me-3 d-flex align-items-center justify-content-center"
                                                    style="width:60px;height:45px;"
                                                >
                                                    <i class="fas fa-book text-muted"></i>
                                                </div>

                                            @endif

                                            <strong>
                                                {{ $inscription->formation->titre }}
                                            </strong>

                                        </div>

                                    </td>


                                    {{-- PROGRESSION --}}
                                    <td style="min-width:150px;">

                                        <div class="d-flex justify-content-between mb-1">

                                            <small>
                                                {{ $inscription->progression }}%
                                            </small>

                                        </div>

                                        <div
                                            class="progress"
                                            style="height:8px;"
                                        >

                                            <div
                                                class="progress-bar
                                                @if($inscription->progression == 100)
                                                    bg-success
                                                @elseif($inscription->progression >= 50)
                                                    bg-warning
                                                @else
                                                    bg-primary
                                                @endif"
                                                style="width: {{ $inscription->progression }}%;"
                                            ></div>

                                        </div>

                                    </td>


                                    {{-- DATE DEBUT --}}
                                    <td>

                                        @if($inscription->date_debut)

                                            {{ \Carbon\Carbon::parse(
                                                $inscription->date_debut
                                            )->format('d/m/Y') }}

                                        @else

                                            <span class="text-muted">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    {{-- DATE FIN --}}
                                    <td>

                                        @if($inscription->date_fin)

                                            {{ \Carbon\Carbon::parse(
                                                $inscription->date_fin
                                            )->format('d/m/Y') }}

                                        @else

                                            <span class="text-muted">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    {{-- TEMPS RESTANT --}}
                                    <td>

                                        @if($inscription->progression >= 100)

                                            <span class="badge bg-success">
                                                Terminée
                                            </span>

                                        @elseif($inscription->date_fin)

                                            @php
                                                $joursRestants = now()->diffInDays(
                                                    \Carbon\Carbon::parse($inscription->date_fin),
                                                    false
                                                );
                                            @endphp


                                            @if($joursRestants > 0)

                                                <span class="badge bg-info text-dark">
                                                    {{ $joursRestants }} jour(s)
                                                </span>

                                            @elseif($joursRestants == 0)

                                                <span class="badge bg-warning text-dark">
                                                    Se termine aujourd'hui
                                                </span>

                                            @else

                                                <span class="badge bg-danger">
                                                    Expirée
                                                </span>

                                            @endif

                                        @else

                                            <span class="text-muted">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    {{-- PROLONGATION --}}
                                    <td>

                                        @if($inscription->prolongee)

                                            <span class="badge bg-secondary">
                                                <i class="fas fa-check me-1"></i>
                                                Utilisée
                                            </span>

                                        @else

                                            <span class="badge bg-light text-dark border">
                                                Non utilisée
                                            </span>

                                        @endif

                                    </td>


                                    {{-- STATUT --}}
                                    <td>

                                        @if($inscription->progression >= 100)

                                            <span class="badge bg-success">
                                                Terminée
                                            </span>

                                        @elseif(
                                            $inscription->date_fin &&
                                            now()->greaterThan(
                                                \Carbon\Carbon::parse($inscription->date_fin)
                                            )
                                        )

                                            <span class="badge bg-danger">
                                                Expirée
                                            </span>

                                        @elseif($inscription->statut == 'valide')

                                            <span class="badge bg-primary">
                                                En cours
                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">
                                                En attente
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

                    <i class="fas fa-book-open fa-3x text-muted mb-3"></i>

                    <h5>
                        Aucune formation
                    </h5>

                    <p class="text-muted mb-0">
                        Cet apprenant n'est inscrit à aucune formation.
                    </p>

                </div>

            @endif

        </div>

    </div>



</div>

@endsection