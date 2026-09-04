@extends('Accueil.layouts.appp')

@section('content')

<!-- ==========================
        HERO SECTION
=========================== -->

<section class="hero-section py-4 py-lg-5 bg-light">

    <div class="container">

        <div class="row align-items-center gy-4">

            <!-- Contenu Texte -->
            <div class="col-lg-6 text-center text-lg-start">

                <span class="badge bg-primary mb-2 mb-lg-3 px-3 py-2 fs-6">
                    🎓 Espace Apprenant
                </span>

                <h1 class="hero-title fs-2 fs-lg-1 fw-bold my-3">
                    Hello {{ Auth::user()->name }}, Bienvenue dans votre espace d'apprentissage
                </h1>

                <p class="hero-text text-muted mb-4 fs-6">
                    Découvrez de nouvelles formations, poursuivez vos cours,
                    développez vos compétences pratiques et suivez votre
                    progression vers l'obtention de vos certificats.
                </p>

                <!-- Recherche responsive -->
                <div class="hero-search mx-auto mx-lg-0" style="max-width: 500px;">
                    <form>
                        <div class="input-group shadow-sm">
                            <input
                                type="text"
                                class="form-control form-control-lg fs-6"
                                placeholder="Rechercher une formation...">

                            <button class="btn btn-primary px-3 px-lg-4" type="submit">
                                <i class="fa-solid fa-magnifying-glass me-1 d-none d-sm-inline"></i>
                                Rechercher
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Image Hero -->
            <div class="col-lg-6 text-center mt-4 mt-lg-0">
                <img
                    src="{{ asset('assets/img/hero-learning.png') }}"
                    class="img-fluid hero-image rounded-3"
                    alt="E-Learning SkillOra"
                    style="max-height: 380px; object-fit: contain;">
            </div>

        </div>

    </div>

</section>

<!-- ==========================
        CATEGORIES (Scrollable sur mobile)
=========================== -->

<section class="category-section py-3 border-bottom bg-white">

    <div class="container">

        <!-- Scroll horizontal fluide sur mobile -->
        <div class="d-flex overflow-auto flex-nowrap justify-content-start justify-content-md-center gap-2 py-2" style="scrollbar-width: none; -ms-overflow-style: none;">

            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3 active text-nowrap">
                Toutes
            </a>

            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3 text-nowrap">
                Couture
            </a>

            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3 text-nowrap">
                Coiffure
            </a>

            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3 text-nowrap">
                Esthétique
            </a>

            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3 text-nowrap">
                Cuisine
            </a>

            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3 text-nowrap">
                Maquillage
            </a>

        </div>

    </div>

</section>

<!-- ==========================
        FORMATIONS
=========================== -->

<section class="courses py-4 py-lg-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fs-3 fw-bold mb-0">
                Toutes les formations
            </h2>

            <a href="#" class="btn btn-sm btn-outline-primary fw-semibold">
                Voir tout
            </a>

        </div>

        <div class="row g-4">

            @forelse($formations as $formation)

            <div class="col-lg-4 col-md-6 col-12">

                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden course-card">

                    <div class="position-relative">
                        @if($formation->image)
                            <img src="{{ asset('storage/'.$formation->image) }}"
                                 class="card-img-top course-image"
                                 alt="{{ $formation->titre }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/img/default-course.jpg') }}"
                                 class="card-img-top course-image"
                                 alt="Formation"
                                 style="height: 200px; object-fit: cover;">
                        @endif

                        @if(optional($formation->formateur)->specialite)
                            <span class="badge bg-primary position-absolute top-0 start-0 m-3 shadow-sm">
                                {{ $formation->formateur->specialite }}
                            </span>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column p-3 p-lg-4">

                        <h5 class="card-title fw-bold text-dark mb-2 fs-5">
                            {{ $formation->titre }}
                        </h5>

                        <p class="card-text text-muted small flex-grow-1 mb-3">
                            {{ Str::limit($formation->description, 90) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">

                            <div class="text-warning small">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <a href="{{ route('details_formations', $formation->id) }}" class="btn btn-sm btn-link text-decoration-none fw-semibold p-0">
                                Voir plus <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">
                <div class="alert alert-info text-center my-4 py-4">
                    <i class="fa-solid fa-info-circle me-2 fs-5"></i> Aucune formation disponible pour le moment.
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection