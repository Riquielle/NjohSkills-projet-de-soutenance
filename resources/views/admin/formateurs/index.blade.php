@extends('admin.layout')

@section('title', 'Gestion des formateurs - SkillOra')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Gestion des formateurs
        </h2>

        <p class="text-muted mb-0">
            Consultez les formateurs inscrits sur la plateforme.
        </p>
    </div>

    <span class="badge bg-primary fs-6 p-2">
        {{ $formateurs->total() }} formateurs
    </span>

</div>


{{-- RECHERCHE --}}

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <form
            action="{{ route('admin.formateurs.index') }}"
            method="GET"
        >

            <div class="row g-3">

                <div class="col-lg-9">

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="fas fa-search text-muted"></i>
                        </span>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Nom, email ou spécialité..."
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


{{-- TABLEAU --}}

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-4">#</th>

                        <th>Formateur</th>

                        <th>Email</th>

                        <th>Spécialité</th>

                        <th>Formations</th>

                        <th>Statut</th>

                        <th class="text-center">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($formateurs as $formateur)

                        <tr>

                            {{-- NUMERO --}}

                            <td class="px-4">

                                {{ $loop->iteration }}

                            </td>


                            {{-- FORMATEUR --}}

                            <td>

                                <div class="d-flex align-items-center">

                                    <div
                                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                        style="width:42px;height:42px;"
                                    >

                                        {{ strtoupper(
                                            substr($formateur->user->name, 0, 1)
                                        ) }}

                                    </div>

                                    <strong>

                                        {{ $formateur->user->name }}

                                    </strong>

                                </div>

                            </td>


                            {{-- EMAIL --}}

                            <td>

                                {{ $formateur->user->email }}

                            </td>


                            {{-- SPECIALITE --}}

                            <td>

                                <span class="badge bg-light text-dark border">

                                    {{ $formateur->specialite }}

                                </span>

                            </td>


                            {{-- FORMATIONS --}}

                            <td>

                                <span class="badge bg-primary">

                                    {{ $formateur->formations->count() }}

                                </span>

                            </td>


                            {{-- STATUT --}}

                           <td>

                                @if($formateur->user->actif)

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
                                    >

                                        <i class="fas fa-ellipsis-v"></i>

                                    </button>


                                    <ul class="dropdown-menu dropdown-menu-end">

                                        {{-- VOIR PROFIL --}}

                                        <li>

                                            <a
                                                class="dropdown-item"
                                                href="{{ route(
                                                    'admin.formateurs.show',
                                                    $formateur->id
                                                ) }}"
                                            >

                                                <i class="fas fa-eye me-2 text-primary"></i>

                                                Voir le profil

                                            </a>

                                        </li>


                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>


                                        {{-- ACTIVER / DESACTIVER --}}

                                        <li>

                                            <form
                                                action="{{ route(
                                                    'admin.formateurs.toggle-status',
                                                    $formateur->id
                                                ) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                @if($formateur->user->actif)

                                                    <button
                                                        type="submit"
                                                        class="dropdown-item text-danger"
                                                        onclick="return confirm('Voulez-vous vraiment désactiver ce formateur ?')"
                                                    >

                                                        <i class="fas fa-user-slash me-2"></i>

                                                        Désactiver

                                                    </button>

                                                @else

                                                    <button
                                                        type="submit"
                                                        class="dropdown-item text-success"
                                                        onclick="return confirm('Voulez-vous réactiver ce formateur ?')"
                                                    >

                                                        <i class="fas fa-user-check me-2"></i>

                                                        Activer

                                                    </button>

                                                @endif

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

                                <i class="fas fa-user-tie fa-3x text-muted mb-3"></i>

                                <h5>
                                    Aucun formateur trouvé
                                </h5>

                                <p class="text-muted">
                                    Aucun formateur ne correspond à votre recherche.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($formateurs->hasPages())

        <div class="card-footer bg-white border-0 py-3">

            {{ $formateurs->withQueryString()->links() }}

        </div>

    @endif

</div>

@endsection