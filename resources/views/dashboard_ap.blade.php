@extends('Accueil.layouts.appp')

@section('content')

<!-- ==========================
        HERO SECTION
=========================== -->

<section class="hero-section py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="badge bg-primary mb-3">
                    🎓 Espace Apprenant
                </span>

                <h1 class="hero-title">

                    Hello {{ Auth::user()->name }}, Bienvenue dans votre espace
                    d'apprentissage

                </h1>

                <p class="hero-text">

                    Découvrez de nouvelles formations, poursuivez vos cours,
                    développez vos compétences pratiques et suivez votre
                    progression vers l'obtention de vos certificats.

                </p>

                <div class="hero-search">

                    <form>

                        <div class="input-group">

                            <input
                                type="text"
                                class="form-control"
                                placeholder="Rechercher une formation">

                            <button
                                class="btn btn-primary">

                                Rechercher

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6 text-center">

                <img
                src="{{ asset('assets/img/hero-learning.png') }}"
                class="img-fluid hero-image">

            </div>

        </div>

    </div>

</section>

<!-- ==========================
        CATEGORIES
=========================== -->

<section class="category-section">

    <div class="container">

        <div class="d-flex flex-wrap justify-content-center gap-3">

            <a href="#" class="category-btn active">
                Toutes
            </a>

            <a href="#" class="category-btn">
                Couture
            </a>

            <a href="#" class="category-btn">
                Coiffure
            </a>

            <a href="#" class="category-btn">
                Esthétique
            </a>

            <a href="#" class="category-btn">
                Cuisine
            </a>

            <a href="#" class="category-btn">
                Maquillage
            </a>

        </div>

    </div>

</section>
<!-- ==========================
        FORMATIONS
=========================== -->

    <section class="courses py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-5">

                <h2>
                    Toutes les formations
                </h2>

                <a href="#" class="btn btn-outline-primary">
                    Voir tout
                </a>

            </div>

            <div class="row">

                @forelse($formations as $formation)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="course-card">

                        @if($formation->image)

                            <img src="{{ asset('storage/'.$formation->image) }}"
                                class="course-image"
                                >

                        @else

                            <img src="{{ asset('assets/img/default-course.jpg') }}"
                                class="course-image"
                                alt="Formation">

                        @endif

                        <div class="course-body">

                            <span class="course-category">

                                {{ $formation->formateur->specialite }}

                            </span>
                            <br>
                            <br>

                            <h4>

                                {{ $formation->titre }}

                            </h4>

                            <p>

                                {{ Str::limit($formation->description,100) }}

                            </p>

                            <div class="course-footer">

                                <div>

                                    ⭐⭐⭐⭐⭐

                                </div>

                                <a href="{{ route('details_formations', $formation->id) }}">

                                    Voir plus →

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Aucune formation disponible pour le moment.

                    </div>

                </div>

                @endforelse

            </div>

        </div>

    </section>

@endsection