@extends('admin.layout')

@section('title', 'Gestion des apprenants - NjohSkills')


@section('content')

{{-- =====================================================
     EN-TÊTE
===================================================== --}}

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            Gestion des apprenants

        </h2>

        <p class="text-muted mb-0">

            Consultez et gérez les apprenants inscrits sur la plateforme.

        </p>

    </div>


    <div>

        <span class="badge bg-primary fs-6 p-2">

            {{ $apprenants->total() }} apprenants

        </span>

    </div>

</div>



{{-- =====================================================
     RECHERCHE
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <form
            action="{{ route('admin.apprenants.index') }}"
            method="GET"
        >

            <div class="row g-3 align-items-center">

                <div class="col-lg-9">

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="fas fa-search text-muted"></i>

                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Rechercher par nom ou email..."
                            value="{{ request('search') }}"
                        >

                    </div>

                </div>


                <div class="col-lg-3">

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >

                        <i class="fas fa-search me-2"></i>

                        Rechercher

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>



{{-- =====================================================
     TABLEAU
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4">

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
                            Email
                        </th>

                        <th>
                            Date d'inscription
                        </th>

                        <th>
                            Statut
                        </th>

                        <th class="text-center">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($apprenants as $apprenant)

                        <tr>

                            <td class="px-4">

                                {{ $loop->iteration }}

                            </td>


                            {{-- NOM --}}

                            <td>

                                <div class="d-flex align-items-center">

                                    <div
                                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                        style="width:42px;height:42px;"
                                    >

                                        {{ strtoupper(substr($apprenant->name, 0, 1)) }}

                                    </div>


                                    <strong>

                                        {{ $apprenant->name }}

                                    </strong>

                                </div>

                            </td>


                            {{-- EMAIL --}}

                            <td>

                                {{ $apprenant->email }}

                            </td>


                            {{-- DATE --}}

                            <td>

                                {{ $apprenant->created_at->format('d/m/Y') }}

                            </td>


                            {{-- STATUT --}}

                            <td>

                                @if($apprenant->actif)

                                    <span class="badge bg-success">
                                        Actif
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Désactivé
                                    </span>

                                @endif

                            </td>


                            {{-- ACTIONS --}}

                           <td class="text-center">

                                <div class="dropdown">

                                    <button
                                        class="btn btn-sm btn-light border"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        data-bs-boundary="viewport"
                                        aria-expanded="false"
                                    >
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end shadow">

                                        

                                        <li>
                                            <a
                                                class="dropdown-item"
                                                href="{{ route('admin.apprenants.show', $apprenant->id) }}"
                                            >
                                                <i class="fas fa-eye me-2 text-primary"></i>
                                                Consulter le profil
                                            </a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>


                                        @if($apprenant->actif)

                                            {{-- DESACTIVER --}}
                                            <li>

                                                <form
                                                    action="{{ route('admin.apprenants.desactiver', $apprenant->id) }}"
                                                    method="POST"
                                                >

                                                    @csrf

                                                    <button
                                                        type="submit"
                                                        class="dropdown-item text-danger"
                                                        onclick="return confirm('Voulez-vous vraiment désactiver cet apprenant ?')"
                                                    >

                                                        <i class="fas fa-user-slash me-2"></i>

                                                        Désactiver

                                                    </button>

                                                </form>

                                            </li>

                                        @else

                                            {{-- ACTIVER --}}
                                            <li>

                                                <form
                                                    action="{{ route('admin.apprenants.activer', $apprenant->id) }}"
                                                    method="POST"
                                                >

                                                    @csrf

                                                    <button
                                                        type="submit"
                                                        class="dropdown-item text-success"
                                                        onclick="return confirm('Voulez-vous réactiver cet apprenant ?')"
                                                    >

                                                        <i class="fas fa-user-check me-2"></i>

                                                        Activer

                                                    </button>

                                                </form>

                                            </li>

                                        @endif

                                    </ul>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5"
                            >

                                <i
                                    class="fas fa-user-slash fa-3x text-muted mb-3"
                                ></i>

                                <h5>

                                    Aucun apprenant trouvé

                                </h5>

                                <p class="text-muted">

                                    Aucun apprenant ne correspond à votre recherche.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>



    {{-- =================================================
         PAGINATION
    ================================================= --}}

    @if($apprenants->hasPages())

        <div class="card-footer bg-white border-0 py-3">

            {{ $apprenants->withQueryString()->links() }}

        </div>

    @endif

</div>

@endsection