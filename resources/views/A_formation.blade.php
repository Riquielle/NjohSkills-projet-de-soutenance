@extends('Accueil.layouts.appf')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        Ajouter une formation
                    </h4>
                </div>

                <div class="card-body">

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

                    <form action="{{ route('store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text"
                                name="titre"
                                class="form-control" placeholder="Titre de la formation">

                            @error('titre')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description"
                                    rows="5"
                                    class="form-control" placeholder="Description de la formation"></textarea>

                            @error('description')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="titre_apercu" class="form-label">Grande question d'accroche de l'aperçu </label>
                            <input type="text" name="titre_apercu" id="titre_apercu" class="form-control" required 
                                placeholder="Ex: Comment puis-je développer de solides compétences en matière de pensée critique afin d'analyser...">
                        </div>

                         @error('titre_apercu')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        <div class="mb-3">
                            <label for="apercu" class="form-label">Apercu détaillé</label>
                            <textarea name="apercu" id="apercu" rows="7" class="form-control" required 
                                    placeholder="Dans ce cours, vous apprendrez à :&#10;- Développer les compétences...&#10;- Renforcer votre capacité à..."></textarea>
                        </div>
                            @error('apercu')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        <div class="mb-3">
                            <label>Prix (FCFA)</label>
                            <input type="number"
                                name="prix"
                                class="form-control" placeholder="Prix de la formation">

                            @error('prix')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Durée</label>
                            <input type="text"
                                name="duree"
                                class="form-control"
                                placeholder="Ex: 4 semaines">

                            @error('duree')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- IMAGE -->
                        <div class="mb-3">
                            <label>Image de la formation</label>

                            <input type="file"
                                name="image"
                                class="form-control" >

                            <small class="text-muted">
                                Formats acceptés : JPG, PNG, JPEG
                            </small>

                            @error('image')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Enregistrer la formation
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection