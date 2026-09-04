@extends('admin.layout')

@section('title', 'Gestion des paiements - SkillOra')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         EN-TÊTE
    ====================================================== --}}

    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Gestion des paiements
            </h2>

            <p class="text-muted mb-0">
                Consultez et gérez les paiements effectués
                par les apprenants.
            </p>

        </div>

    </div>


    {{-- =====================================================
         STATISTIQUES
    ====================================================== --}}

    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <small class="text-muted">
                                Total paiements
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $totalPaiements }}
                            </h3>

                        </div>

                        <div class="bg-primary bg-opacity-10
                                    rounded-circle p-3">

                            <i class="fas fa-credit-card
                                      text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <small class="text-muted">
                                Paiements réussis
                            </small>

                            <h3 class="fw-bold text-success mb-0">
                                {{ $paiementsPayes }}
                            </h3>

                        </div>

                        <div class="bg-success bg-opacity-10
                                    rounded-circle p-3">

                            <i class="fas fa-check-circle
                                      text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <small class="text-muted">
                                En attente
                            </small>

                            <h3 class="fw-bold text-warning mb-0">
                                {{ $paiementsAttente }}
                            </h3>

                        </div>

                        <div class="bg-warning bg-opacity-10
                                    rounded-circle p-3">

                            <i class="fas fa-clock
                                      text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <small class="text-muted">
                                Revenus
                            </small>

                            <h4 class="fw-bold text-primary mb-0">

                                {{ number_format(
                                    $revenus,
                                    0,
                                    ',',
                                    ' '
                                ) }}

                                FCFA

                            </h4>

                        </div>

                        <div class="bg-primary bg-opacity-10
                                    rounded-circle p-3">

                            <i class="fas fa-money-bill-wave
                                      text-primary"></i>

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
                action="{{ route('admin.paiements.index') }}"
                method="GET"
            >

                <div class="row g-3">

                    <div class="col-12 col-lg-7">

                        <div class="input-group">

                            <span class="input-group-text bg-white">

                                <i class="fas fa-search
                                          text-muted"></i>

                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Nom, email, formation ou référence..."
                                value="{{ request('search') }}"
                            >

                        </div>

                    </div>


                    <div class="col-12 col-md-6 col-lg-3">

                        <select
                            name="statut"
                            class="form-select"
                        >

                            <option value="">
                                Tous les statuts
                            </option>

                            <option
                                value="paye"
                                {{ request('statut') == 'paye'
                                    ? 'selected'
                                    : '' }}
                            >
                                Payé
                            </option>

                            <option
                                value="en_attente"
                                {{ request('statut') == 'en_attente'
                                    ? 'selected'
                                    : '' }}
                            >
                                En attente
                            </option>

                            <option
                                value="echec"
                                {{ request('statut') == 'echec'
                                    ? 'selected'
                                    : '' }}
                            >
                                Échec
                            </option>

                        </select>

                    </div>


                    <div class="col-12 col-md-6 col-lg-2">

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

            <h5 class="fw-bold mb-0">

                <i class="fas fa-list me-2 text-primary"></i>

                Liste des paiements

            </h5>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                # 
                            </th>

                            <th>
                                Apprenant
                            </th>

                            <th>
                                Formation
                            </th>

                            <th>
                                Montant
                            </th>

                            <th>
                                Méthode
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

                        @forelse($paiements as $paiement)

                            <tr>

                                <td class="px-4">

                                    {{ $paiement->id }}

                                </td>


                                <td>

                                    <div class="d-flex
                                                align-items-center">

                                        <div
                                            class="rounded-circle
                                                   bg-primary
                                                   text-white
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   me-2"
                                            style="width:38px;
                                                   height:38px;"
                                        >

                                            {{ strtoupper(
                                                substr(
                                                    $paiement->apprenant->name,
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                        <div>

                                            <strong>
                                                {{ $paiement->apprenant->name }}
                                            </strong>

                                            <small class="d-block
                                                          text-muted">

                                                {{ $paiement->apprenant->email }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    {{ $paiement->formation->titre }}

                                </td>


                                <td>

                                    <strong>

                                        {{ number_format(
                                            $paiement->montant,
                                            0,
                                            ',',
                                            ' '
                                        ) }}

                                        FCFA

                                    </strong>

                                </td>


                                <td>

                                    {{ ucfirst(
                                        $paiement->methode
                                    ) }}

                                </td>


                                <td>

                                    @if($paiement->statut === 'paye')

                                        <span class="badge bg-success">

                                            <i class="fas fa-check me-1"></i>

                                            Payé

                                        </span>

                                    @elseif($paiement->statut === 'en_attente')

                                        <span
                                            class="badge bg-warning text-dark"
                                        >

                                            <i class="fas fa-clock me-1"></i>

                                            En attente

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            <i class="fas fa-times me-1"></i>

                                            Échec

                                        </span>

                                    @endif

                                </td>


                                <td>

                                    {{ $paiement->created_at
                                        ->format('d/m/Y H:i') }}

                                </td>


                                <td class="text-center">

                                    <a
                                        href="{{ route(
                                            'admin.paiements.show',
                                            $paiement->id
                                        ) }}"
                                        class="btn btn-sm
                                               btn-outline-primary"
                                    >

                                        <i class="fas fa-eye"></i>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="fas fa-credit-card
                                               fa-3x
                                               text-muted
                                               mb-3"
                                    ></i>

                                    <h5>
                                        Aucun paiement trouvé
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Aucun paiement ne correspond
                                        à votre recherche.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PAGINATION --}}

        @if($paiements->hasPages())

            <div class="card-footer bg-white border-0 py-3">

                {{ $paiements->links() }}

            </div>

        @endif

    </div>

</div>

@endsection