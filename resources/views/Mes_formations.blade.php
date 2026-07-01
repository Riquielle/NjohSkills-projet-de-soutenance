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
        <h2>Mes Formations</h2>

        <a href="{{ route('A_formation') }}"
           class="btn btn-primary">
            Ajouter une formation
        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Prix</th>
                            <th>Durée</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($formations as $formation)

                        <tr>

                            <td>{{ $formation->id }}</td>

                            <td>{{ $formation->titre }}</td>

                            <td>{{ number_format($formation->prix,0,',',' ') }} FCFA</td>

                            <td>{{ $formation->duree }}</td>

                            <td>{{ $formation->created_at->format('d/m/Y') }}</td>

                            <td>
                                 <!-- MODULES -->
                                <a href="{{ route('modules', $formation->id) }}"
                                class="btn btn-info btn-sm">
                                    <i class="fas fa-layer-group"></i> Modules
                                </a>

                                 <!-- MODIFIER -->
                                <button class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $formation->id }}">
                                    Modifier
                                </button>

                                <!-- SUPPRIMER -->
                                <button class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $formation->id }}">
                                    Supprimer
                                </button>

                            </td>

                        </tr>

                        <!-- ================= EDIT MODAL ================= -->
                        <div class="modal fade" id="edit{{ $formation->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form method="POST"
                                        action="{{ route('formations.update', $formation->id) }}"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier formation</h5>
                                        </div>

                                        <div class="modal-body">

                                            <div class="mb-3"> 
                                                <label for="titre" class="form-label">Titre</label>
                                                <input type="text" name="titre"
                                                    value="{{ $formation->titre }}"
                                                    class="form-control mb-2">
                                            </div>
                                            <div class="mb-3"> 
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description"
                                                    class="form-control mb-2">{{ $formation->description }}</textarea>
                                            </div>
                                            <div class="mb-3">    
                                                <label for="titre_apercu" class="form-label">Titre de l'aperçu</label>
                                                <textarea name="titre_apercu" id="titre_apercu" rows="7" 
                                                    class="form-control">{{ old('titre_apercu', $formation->titre_apercu) }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apercu" class="form-label">Aperçu détaillé</label>
                                                <textarea name="apercu" id="apercu" rows="7" class="form-control">{{ old('apercu', $formation->apercu) }}</textarea>
                                            </div>
                                            <div>
                                                <label for="prix" class="form-label">Prix</label>
                                                <input type="number" name="prix"
                                                    value="{{ $formation->prix }}"
                                                    class="form-control mb-2">
                                            </div>
                                            
                                            <div><label for="duree" class="form-label">Durée</label>
                                                <input type="text" name="duree"
                                                    value="{{ $formation->duree }}"
                                                    class="form-control mb-2">
                                            </div>

                                            <div><label for="image" class="form-label">Image</label>
                                                <input type="file" name="image"
                                                    class="form-control mb-2">

                                                @if($formation->image)
                                                    <img src="{{ asset('storage/'.$formation->image) }}"
                                                        width="100" class="rounded">
                                                @endif
                                            </div> 

                                                

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary">
                                                Mettre à jour
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- ================= DELETE MODAL ================= -->
                        <div class="modal fade" id="delete{{ $formation->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form method="POST"
                                        action="{{ route('formations.destroy', $formation->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <div class="modal-header">
                                            <h5>Confirmation</h5>
                                        </div>

                                        <div class="modal-body">
                                            Voulez-vous supprimer cette formation ?
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                Annuler
                                            </button>

                                             <button type="submit"
                                                    class="btn btn-danger">
                                                Supprimer
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center text-muted">
                                Aucune formation trouvée
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection


