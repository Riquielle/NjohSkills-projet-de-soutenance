@extends('Accueil.layouts.appf')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
			<div class="alert alert-danger text-center">
				{{ Session::get('error') }}
			</div>
		@endif

        <div class="d-flex align-items-center">

            <!-- Bouton retour -->
            <a href="{{ route('Mes_formations') }}"
               class="btn btn-light border rounded-circle me-3"
               title="Retour aux formations"
               style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

                <i class="fas fa-arrow-left"></i>

            </a>

            <div>

                <h2 class="fw-bold mb-1">
                    Modules de la formation
                </h2>

                <p class="text-muted mb-0">
                    {{ $formation->titre }}
                </p>

            </div>

        </div>

        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#addModule">

            + Ajouter un module

        </button>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            @forelse($modules as $module)

            <div class="border rounded p-4 mb-3">

                <div class="d-flex justify-content-between">

                    <div>

                        <h4>

                            {{ $module->ordre }}.

                            {{ $module->titre }}

                        </h4>

                        <p class="text-muted">

                            {{ $module->objectif }}

                        </p>

                    </div>

                    <div>

                        <a href="{{ route('lecons', $module->id) }}"
                            class="btn btn-success btn-sm">

                                <i class="fas fa-book-open"></i>
                                Leçons

                        </a>


                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModule{{ $module->id }}">

                            Modifier

                        </button>

                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModule{{ $module->id }}">

                            Supprimer

                        </button>

                    </div>

                </div>

            </div>

            

            <div class="modal fade"
                id="editModule{{ $module->id }}"
                tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                    <form method="POST"
                        action="{{ route('modules.update',$module->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="modal-header">

                    <h5>Modifier le module</h5>

                    <button class="btn-close"
                            data-bs-dismiss="modal"></button>

                    </div>

                    <div class="modal-body">

                    <input type="text"
                        name="titre"
                        value="{{ $module->titre }}"
                        class="form-control mb-3">

                    <textarea name="objectif"
                            rows="4"
                            class="form-control mb-3">{{ $module->objectif }}</textarea>

                    <input type="number"
                        name="ordre"
                        value="{{ $module->ordre }}"
                        class="form-control">

                    </div>

                    <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                    Annuler

                    </button>

                    <button class="btn btn-warning">

                    Mettre à jour

                    </button>

                    </div>

                    </form>

                    </div>

                </div>

            </div>


            <div class="modal fade"
                    id="deleteModule{{ $module->id }}"
                    tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="POST"
                            action="{{ route('modules.destroy',$module->id) }}">

                        @csrf
                        @method('DELETE')

                            <div class="modal-header">

                            <h5>Confirmation</h5>

                            <button class="btn-close"
                                    data-bs-dismiss="modal"></button>

                            </div>

                            <div class="modal-body">

                            Voulez-vous vraiment supprimer ce module ?

                            </div>

                            <div class="modal-footer">

                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">

                            Annuler

                            </button>

                            <button class="btn btn-danger">

                            Supprimer

                            </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>



            @empty

            <div class="alert alert-info">

                Aucun module disponible.

            </div>

            @endforelse

        </div>

    </div>

</div>

<!-- ================= AJOUT MODULE ================= -->

            <div class="modal fade" id="addModule" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="POST"
                            action="{{ route('modules.store',$formation->id) }}">

                        @csrf

                        <div class="modal-header">

                        <h5>Ajouter un module</h5>

                        <button class="btn-close"
                                data-bs-dismiss="modal"></button>

                        </div>

                        <div class="modal-body">

                        <div class="mb-3">

                        <label>Titre</label>

                        <input type="text"
                            name="titre"
                            class="form-control">

                        </div>

                        <div class="mb-3">

                        <label>Objectif</label>

                        <textarea name="Objectif"
                                rows="4"
                                class="form-control"></textarea>

                        </div>

                        <div class="mb-3">

                        <label>Ordre</label>

                        <input type="number"
                            name="ordre"
                            value="{{ $modules->count()+1 }}"
                            class="form-control">

                        </div>

                        </div>

                        <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">

                        Annuler

                        </button>

                        <button class="btn btn-primary">

                        Enregistrer

                        </button>

                        </div>

                        </form>

                    </div>

                </div>

            </div>



@endsection