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

            <!-- Retour -->
            <a href="{{ route('modules', $module->formation_id) }}"
               class="btn btn-light border rounded-circle me-3"
               title="Retour aux modules"
               style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

                <i class="fas fa-arrow-left"></i>

            </a>

            <div>

                <h2 class="fw-bold mb-1">
                    Leçons du module
                </h2>

                <p class="text-muted mb-0">
                    {{ $module->titre }}
                </p>

            </div>

        </div>

        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#addLecon">

            + Ajouter une leçon

        </button>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            @forelse($lecons as $lecon)

            <div class="border rounded p-4 mb-3">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="mb-2">
                            {{ $lecon->ordre }}.
                            {{ $lecon->titre }}
                        </h4>

                        <p class="text-muted mb-0">
                            {{ $lecon->description }}
                        </p>

                    </div>

                    <div>

                        <a href="{{ route('ressources',$lecon->id) }}"
                           class="btn btn-success btn-sm">

                            <i class="fas fa-folder-open"></i>
                            Ressources

                        </a>

                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editLecon{{ $lecon->id }}">

                            Modifier

                        </button>

                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteLecon{{ $lecon->id }}">

                            Supprimer

                        </button>

                    </div>

                </div>

            </div>

            <!-- MODAL MODIFIER -->

            <div class="modal fade"
                 id="editLecon{{ $lecon->id }}"
                 tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="POST"
                              action="{{ route('lecons.update',$lecon->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="modal-header">

                                <h5>Modifier la leçon</h5>

                                <button class="btn-close"
                                        data-bs-dismiss="modal"></button>

                            </div>

                            <div class="modal-body">

                                <div class="mb-3">

                                    <label>Titre</label>

                                    <input type="text"
                                           name="titre"
                                           class="form-control"
                                           value="{{ $lecon->titre }}">

                                </div>

                                <div class="mb-3">

                                    <label>Description</label>

                                    <textarea name="description"
                                              rows="5"
                                              class="form-control">{{ $lecon->description }}</textarea>

                                </div>

                                <div class="mb-3">

                                    <label>Ordre</label>

                                    <input type="number"
                                           name="ordre"
                                           class="form-control"
                                           value="{{ $lecon->ordre }}">

                                </div>

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

            <!-- MODAL SUPPRIMER -->

            <div class="modal fade"
                 id="deleteLecon{{ $lecon->id }}"
                 tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="POST"
                              action="{{ route('lecons.destroy',$lecon->id) }}">

                            @csrf
                            @method('DELETE')

                            <div class="modal-header">

                                <h5>Confirmation</h5>

                                <button class="btn-close"
                                        data-bs-dismiss="modal"></button>

                            </div>

                            <div class="modal-body">

                                Voulez-vous supprimer cette leçon ?

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

                Aucune leçon disponible.

            </div>

            @endforelse

        </div>

    </div>

</div>

<!-- MODAL AJOUT -->

<div class="modal fade"
     id="addLecon"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="POST"
                  action="{{ route('lecons.store',$module->id) }}">

                @csrf

                <div class="modal-header">

                    <h5>Ajouter une leçon</h5>

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

                        <label>Description</label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control"></textarea>

                    </div>

                    <div class="mb-3">

                        <label>Ordre</label>

                        <input type="number"
                               name="ordre"
                               value="{{ $lecons->count()+1 }}"
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
