@extends('admin.layout')

@section('title', 'Gestion des inscriptions - SkillOra')

@section('content')

<div class="container-fluid px-0">

    {{-- =====================================================
         EN-TÊTE
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Gestion des inscriptions
            </h2>

            <p class="text-muted mb-0">
                Consultez et suivez les inscriptions des apprenants.
            </p>

        </div>

    </div>


    {{-- =====================================================
         STATISTIQUES
    ====================================================== --}}

    <div class="row g-3 mb-4">

        {{-- TOTAL --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total inscriptions
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $totalInscriptions }}
                            </h3>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-users text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- VALIDES --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Inscriptions valides
                            </small>

                            <h3 class="fw-bold mb-0 text-success">
                                {{ $inscriptionsValides }}
                            </h3>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-check-circle text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- EN ATTENTE --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                En attente
                            </small>

                            <h3 class="fw-bold mb-0 text-warning">
                                {{ $inscriptionsEnAttente }}
                            </h3>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-clock text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- TERMINEES --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Formations terminées
                            </small>

                            <h3 class="fw-bold mb-0 text-info">
                                {{ $inscriptionsTerminees }}
                            </h3>

                        </div>

                        <div class="bg-info bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-graduation-cap text-info"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RECHERCHE / FILTRE
    ====================================================== --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form
                action="{{ route('admin.inscriptions.index') }}"
                method="GET"
            >

                <div class="row g-3">

                    {{-- RECHERCHE --}}
                    <div class="col-12 col-lg-7">

                        <label class="form-label fw-semibold">
                            Rechercher
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">

                                <i class="fas fa-search text-muted"></i>

                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Nom, email ou formation..."
                                value="{{ request('search') }}"
                            >

                        </div>

                    </div>


                    {{-- STATUT --}}
                    <div class="col-12 col-md-6 col-lg-3">

                        <label class="form-label fw-semibold">
                            Statut
                        </label>

                        <select
                            name="statut"
                            class="form-select"
                        >

                            <option value="">
                                Tous les statuts
                            </option>

                            <option
                                value="valide"
                                {{ request('statut') == 'valide' ? 'selected' : '' }}
                            >
                                Valide
                            </option>

                            <option
                                value="en_attente"
                                {{ request('statut') == 'en_attente' ? 'selected' : '' }}
                            >
                                En attente
                            </option>

                        </select>

                    </div>


                    {{-- BOUTON --}}
                    <div class="col-12 col-md-6 col-lg-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >

                            <i class="fas fa-filter me-2"></i>

                            Filtrer

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =====================================================
         TABLEAU
    ====================================================== --}}

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">

            <h5 class="fw-bold mb-1">
                Liste des inscriptions
            </h5>

            <p class="text-muted mb-0">
                {{ $inscriptions->total() }} inscription(s) trouvée(s)
            </p>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                Apprenant
                            </th>

                            <th>
                                Formation
                            </th>

                            <th>
                                Formateur
                            </th>

                            <th>
                                Progression
                            </th>

                            <th>
                                Statut
                            </th>

                            <th>
                                Date
                            </th>

                            <th class="text-center">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($inscriptions as $inscription)

                            <tr>

                                {{-- APPRENANT --}}
                                <td class="px-4">

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 flex-shrink-0"
                                            style="width:40px;height:40px;"
                                        >

                                            {{ strtoupper(
                                                substr(
                                                    $inscription->user->name ?? 'A',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                        <div>

                                            <strong class="d-block">

                                                {{ $inscription->user->name ?? 'Utilisateur supprimé' }}

                                            </strong>

                                            <small class="text-muted">

                                                {{ $inscription->user->email ?? '' }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- FORMATION --}}
                                <td>

                                    <strong>

                                        {{ $inscription->formation->titre ?? 'Formation supprimée' }}

                                    </strong>

                                </td>


                                {{-- FORMATEUR --}}
                                <td>

                                    @if(
                                        $inscription->formation &&
                                        $inscription->formation->formateur
                                    )

                                        {{ $inscription->formation->formateur->user->name }}

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- PROGRESSION --}}
                                <td style="min-width:150px;">

                                    <div class="d-flex align-items-center gap-2">

                                        <div
                                            class="progress flex-grow-1"
                                            style="height:8px;"
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
                                            </div>

                                        </div>

                                        <small class="fw-semibold">

                                            {{ $inscription->progression }}%

                                        </small>

                                    </div>

                                </td>


                                {{-- STATUT --}}
                                <td>

                                    @if($inscription->statut === 'valide')

                                        <span class="badge bg-success">
                                            Valide
                                        </span>

                                    @elseif($inscription->statut === 'en_attente')

                                        <span class="badge bg-warning text-dark">
                                            En attente
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ ucfirst($inscription->statut) }}
                                        </span>

                                    @endif

                                </td>


                                {{-- DATE --}}
                                <td>

                                    <small>

                                        {{ $inscription->created_at->format('d/m/Y') }}

                                    </small>

                                </td>


                                {{-- ACTION --}}
                                <td class="text-center">

                                    <a
                                        href="{{ route('admin.inscriptions.show', $inscription->id) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Voir l'inscription"
                                    >

                                        <i class="fas fa-eye"></i>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="fas fa-user-graduate fa-3x text-muted mb-3"
                                    ></i>

                                    <h5>
                                        Aucune inscription trouvée
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Aucune inscription ne correspond à votre recherche.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PAGINATION --}}
        @if($inscriptions->hasPages())

            <div class="card-footer bg-white border-0 py-3">

                {{ $inscriptions->links() }}

            </div>

        @endif

    </div>

</div>

@endsection