@extends('admin.layout')

@section('title', 'Gestion des formations - SkillOra')


@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
        ></button>

    </div>

@endif


@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">

        <i class="fas fa-exclamation-circle me-2"></i>

        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
        ></button>

    </div>

@endif

@section('content')

{{-- =====================================================
     EN-TÊTE
===================================================== --}}

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Gestion des formations
        </h2>

        <p class="text-muted mb-0">
            Consultez et gérez les formations proposées sur SkillOra.
        </p>

    </div>

    <div>

        <span class="badge bg-primary fs-6 p-2">
            {{ $formations->total() }} formations
        </span>

    </div>

</div>


{{-- =====================================================
     MESSAGES
===================================================== --}}

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        <i class="fas fa-exclamation-circle me-2"></i>

        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- =====================================================
     RECHERCHE + FILTRE
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <form
            action="{{ route('admin.formations.index') }}"
            method="GET"
        >

            <div class="row g-3">

                {{-- RECHERCHE --}}

                <div class="col-12 col-lg-6">

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="fas fa-search text-muted"></i>

                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Rechercher une formation..."
                            value="{{ request('search') }}"
                        >

                    </div>

                </div>


                {{-- FILTRE --}}

                <div class="col-12 col-md-6 col-lg-3">

                    <select
                        name="statut"
                        class="form-select"
                    >

                        <option value="">
                            Tous les statuts
                        </option>

                        <option
                            value="publie"
                            {{ request('statut') == 'publie' ? 'selected' : '' }}
                        >
                            Publiées
                        </option>

                        <option
                            value="brouillon"
                            {{ request('statut') == 'brouillon' ? 'selected' : '' }}
                        >
                            Brouillons
                        </option>

                    </select>

                </div>


                {{-- BOUTON --}}

                <div class="col-12 col-md-6 col-lg-3">

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
===================================================== --}}

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-4">
                            Formation
                        </th>

                        <th>
                            Formateur
                        </th>

                        <th>
                            Prix
                        </th>

                        <th>
                            Durée
                        </th>

                        <th class="text-center">
                            Apprenants
                        </th>

                        <th class="text-center">
                            Statut
                        </th>

                        <th class="text-center">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($formations as $formation)

                        <tr>

                            {{-- FORMATION --}}

                            <td class="px-4">

                                <div class="d-flex align-items-center">

                                    @if($formation->image)

                                        <img
                                            src="{{ asset('storage/'.$formation->image) }}"
                                            alt="{{ $formation->titre }}"
                                            class="rounded-3 me-3"
                                            style="
                                                width:60px;
                                                height:60px;
                                                object-fit:cover;
                                            "
                                        >

                                    @else

                                        <div
                                            class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                            style="
                                                width:60px;
                                                height:60px;
                                                flex-shrink:0;
                                            "
                                        >

                                            <i class="fas fa-book"></i>

                                        </div>

                                    @endif


                                    <div style="min-width:180px;">

                                        <strong class="d-block">

                                            {{ $formation->titre }}

                                        </strong>

                                        <small class="text-muted">

                                            Formation #{{ $formation->id }}

                                        </small>

                                    </div>

                                </div>

                            </td>


                            {{-- FORMATEUR --}}

                            <td>

                                @if($formation->formateur && $formation->formateur->user)

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                                            style="
                                                width:36px;
                                                height:36px;
                                                flex-shrink:0;
                                            "
                                        >

                                            {{
                                                strtoupper(
                                                    substr(
                                                        $formation->formateur->user->name,
                                                        0,
                                                        1
                                                    )
                                                )
                                            }}

                                        </div>

                                        <span>

                                            {{ $formation->formateur->user->name }}

                                        </span>

                                    </div>

                                @else

                                    <span class="text-muted">
                                        Non attribué
                                    </span>

                                @endif

                            </td>


                            {{-- PRIX --}}

                            <td>

                                <strong>

                                    {{ number_format(
                                        $formation->prix,
                                        0,
                                        ',',
                                        ' '
                                    ) }}

                                </strong>

                                <small class="text-muted">
                                    FCFA
                                </small>

                            </td>


                            {{-- DURÉE --}}

                            <td>

                                {{ $formation->duree }}

                            </td>


                            {{-- APPRENANTS --}}

                            <td class="text-center">

                                <span class="badge bg-primary">

                                    {{ $formation->apprenants_count }}

                                </span>

                            </td>


                            {{-- STATUT --}}

                            <td class="text-center">

                                @if($formation->statut === 'publie')

                                    <span class="badge bg-success">

                                        <i class="fas fa-check-circle me-1"></i>

                                        Publiée

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        <i class="fas fa-file me-1"></i>

                                        Brouillon

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
                                        aria-expanded="false"
                                    >

                                        <i class="fas fa-ellipsis-v"></i>

                                    </button>


                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                                        {{-- VOIR --}}

                                        <li>

                                            <a
                                                href="{{ route('admin.formations.show', $formation->id ) }}"
                                                class="dropdown-item"
                                            >

                                                <i class="fas fa-eye text-primary me-2"></i>

                                                Voir la formation

                                            </a>

                                        </li>


                                        {{-- PUBLICATION --}}

                                        <li>

                                            <form
                                                action="{{ route('admin.formations.toggle', $formation->id ) }}"
                                                    
                                                    
                                                method="POST"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="dropdown-item"
                                                >

                                                    @if($formation->statut === 'publie')

                                                        <i class="fas fa-eye-slash text-warning me-2"></i>

                                                        Dépublier

                                                    @else

                                                        <i class="fas fa-check text-success me-2"></i>

                                                        Publier

                                                    @endif

                                                </button>

                                            </form>

                                        </li>


                                        <li>

                                            <hr class="dropdown-divider">

                                        </li>


                                        {{-- SUPPRIMER --}}

                                        <li>

                                           <form
                                                action="{{ route('admin.formations.destroy', $formation->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Voulez-vous vraiment supprimer cette formation ? Cette action est irréversible.')"
                                            >
                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="dropdown-item text-danger"
                                                >
                                                    <i class="fas fa-trash me-2"></i>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </li>

                                    </ul>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-5"
                            >

                                <i
                                    class="fas fa-book-open fa-3x text-muted mb-3"
                                ></i>

                                <h5>
                                    Aucune formation trouvée
                                </h5>

                                <p class="text-muted mb-0">

                                    Aucune formation ne correspond à votre recherche.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- PAGINATION --}}

    @if($formations->hasPages())

        <div class="card-footer bg-white border-0 py-3">

            {{ $formations->withQueryString()->links() }}

        </div>

    @endif

</div>

@endsection