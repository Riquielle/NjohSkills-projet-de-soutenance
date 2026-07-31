@extends('Accueil.layouts.appp') {{-- Utilise 'appp' comme votre code d'origine --}}

@section('content')
<div class="bg-light pb-5">
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Tous les cours</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">
                    {{ $formation->formateur?->specialite ?? 'Général' }}
                </li>
            </ol>
        </nav>
    </div>

    <div class="container mt-4">
        <div class="row g-4">
            
            <div class="col-lg-7">
                <span class="badge bg-primary mb-3">🎓 Espace Apprenant</span>
                
                <h1 class="display-5 fw-bold text-dark mb-4">
                    {{ $formation->titre }}
                </h1>
                
                <p class="lead text-secondary mb-4 lh-base" style="font-size: 1.15rem;">
                    {{ $formation->description }}
                </p>

                

                <ul class="nav nav-tabs border-bottom-0 custom-tabs" id="courseTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="apercu-tab" data-bs-toggle="tab" data-bs-target="#apercu" type="button" role="tab">Aperçu</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="lecons-tab" data-bs-toggle="tab" data-bs-target="#lecons" type="button" role="tab">Leçons</button>
                    </li>
                </ul>
                <hr class="mt-0 mb-4" style="color: #dee2e6; height: 2px;">

                <div class="tab-content pt-2" id="courseTabContent">
                    <div class="tab-pane fade show active" id="apercu" role="tabpanel">
                        
                        <h3 class="fw-bold text-dark mb-4" style="font-size: 1.6rem; line-height: 1.4; max-width: 95%;">
                            {{ $formation->titre_apercu }}
                        </h3>
                        
                        <div class="text-secondary lh-lg" style="font-size: 1.05rem;">
                            @if(Str::contains($formation->apercu, ['-', '*']))
                                {{-- Si le formateur a mis ses propres tirets --}}
                                <div class="ps-2">
                                    {!! nl2br(e($formation->apercu)) !!}
                                </div>
                            @else
                                {{-- Si le texte est brut, on le transforme automatiquement en liste à puces HTML --}}
                                <ul class="ps-4" style="list-style-type: disc;">
                                    @foreach(explode("\n", str_replace("\r", "", $formation->apercu)) as $ligne)
                                        @if(trim($ligne) != '')
                                            <li class="mb-2">{{ ltrim(trim($ligne), '-* ') }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="lecons" role="tabpanel">

                        @forelse($formation->modules as $index => $module)

                            <div class="accordion mb-3" id="accordionModule{{ $module->id }}">

                                <div class="accordion-item border rounded shadow-sm">

                                    <h2 class="accordion-header">

                                        <button class="accordion-button @if($index!=0) collapsed @endif"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $module->id }}">

                                            <strong>

                                                Module {{ $module->ordre }}

                                                :

                                                {{ $module->titre }}

                                            </strong>

                                        </button>

                                    </h2>

                                    <div id="collapse{{ $module->id }}"
                                        class="accordion-collapse collapse @if($index==0) show @endif">

                                        <div class="accordion-body">

                                            <p class="text-muted mb-3">

                                                {{ $module->objectif }}

                                            </p>

                                            @if($module->lecons->count())

                                                <ul class="list-group">

                                                    @foreach($module->lecons as $lecon)

                                                        <li class="list-group-item">

                                                            <div>

                                                                <i class="fas fa-book-open text-primary me-2"></i>

                                                                <strong>

                                                                    {{ $lecon->ordre }}.

                                                                    {{ $lecon->titre }}

                                                                </strong>

                                                                <br>

                                                                <small class="text-muted">

                                                                    {{ $lecon->description }}

                                                                </small>

                                                            </div>

                                                        </li>

                                                    @endforeach

                                                </ul>

                                            @else

                                                <div class="alert alert-warning mb-0">

                                                    Aucune leçon disponible pour ce module.

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="alert alert-info">

                                Aucun module n'a encore été ajouté.

                            </div>

                        @endforelse

                    </div>
                </div>
            </div>

            <div class="col-lg-5 position-relative">
                @if (Session::has('success'))
						<div class="alert alert-success text-center">
							{{ Session::get('success') }}
						</div>
					@endif

					@if (Session::has('error'))
						<div class="alert alert-danger text-center">
							{{ Session::get('error') }}
						</div>
					@endif
                <div class="bg-primary position-absolute end-0 top-0 rounded-start-4 d-none d-lg-block" style="width: 70%; height: 200px; z-index: 1; background-color: #0056b3 !important;"></div>
                
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative mx-auto ms-lg-5" style="max-width: 420px; z-index: 2; margin-top: 20px;">
                    
                    @if($formation->image)
                        <img src="{{ asset('storage/' . $formation->image) }}" class="card-img-top" style="height: 280px; object-fit: cover;" alt="{{ $formation->titre }}">
                    @else
                        <img src="{{ asset('assets/img/default-course.jpg') }}" class="card-img-top" style="height: 280px; object-fit: cover;" alt="Formation">
                    @endif

                    <div class="card-body p-0">
                        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted">Durée</span>
                            <span class="fw-semibold text-dark">
                                {{ $formation->duree ?? 'À votre rythme' }}
                            </span>
                        </div>
                        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted">Progression</span>
                            <span class="fw-semibold text-dark">À votre rythme</span>
                        </div>
                        <div class="p-3 d-flex justify-content-between align-items-start">
                            <span class="text-muted me-3">Spécialité</span>
                            <span class="fw-semibold text-dark text-end" style="max-width: 60%;">
                                {{ $formation->formateur?->specialite ?? 'Général' }}
                            </span>
                        </div>
                        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted me-3">Formateur</span>
                            <span class="fw-semibold text-dark text-end" style="max-width: 60%;">
                                {{ $formation->formateur->user?->name ?? 'Non spécifié' }} {{-- Remplacez 'name' par 'nom' selon le champ de votre table formateurs --}}
                            </span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span>💰</span> Tarif : {{ $formation->prix > 0 ? $formation->prix . ' XAF' : 'Gratuit' }}
                        </div>
                        <div class="p-3">
                            

                            @if(!$inscription)

                                <a href="{{ route('paiement', $formation->id) }}"
                                class="btn btn-primary w-100 py-2 fw-semibold rounded-3 shadow-sm"
                                style="background-color: #0056b3; border: none;">
                                    S'inscrire
                                </a>
                            @elseif($inscription->progression == 0)

                                <a href="{{ route('ma_formation', $formation->id) }}"
                                class="btn btn-success btn-lg">
                                    Commencer la formation
                                </a>

                            @elseif($inscription->progression < 100)

                                <a href="{{ route('ma_formation', $formation->id) }}"
                                class="btn btn-warning btn-lg">
                                    Continuer la formation
                                </a>

                            @else

                                <a href="{{ route('ma_formation', $formation->id) }}"
                                class="btn btn-info btn-lg">
                                    Formation terminée
                                </a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection