@extends('Accueil.layouts.app')
@section('content')

        <section class="section-top">
            <div class="container">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                        <h1>Toutes les formations</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Accueil</a></li>
                            <li> / Formations</li>
                        </ul>
                    </div></div></div></section>  
        <section class="courses py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2>Toutes les formations</h2>
                    <a href="#" class="btn btn-outline-primary">Voir tout</a>
                </div>

                <div class="row">
                    @forelse($formations as $formation)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                            @if($formation->image)
                                <img src="{{ asset('storage/'.$formation->image) }}" 
                                     class="card-img-top" 
                                     style="height: 200px; object-fit: cover;" 
                                     alt="{{ $formation->titre }}">
                            @else
                                <img src="{{ asset('assets/img/default-course.jpg') }}" 
                                     class="card-img-top" 
                                     style="height: 200px; object-fit: cover;" 
                                     alt="Formation">
                            @endif

                            <div class="card-body d-flex flex-column p-4">
                                <div>
                                    <span class="badge bg-primary mb-2">
                                        {{ $formation->formateur->specialite ?? 'Général' }}
                                    </span>
                                    <h4 class="h5 fw-bold text-dark mb-2 text-truncate">
                                        {{ $formation->titre }}
                                    </h4>
                                    <p class="text-muted small mb-3">
                                        {{ Str::limit($formation->description, 80) }}
                                    </p>
                                </div>

                                <div class="mt-auto d-flex justify-content-between align-items-center border-top pt-3">
                                    <small class="text-warning">⭐⭐⭐⭐⭐</small>
                                    <a href="{{ route('details_formations', $formation->id) }}" class="btn btn-sm btn-outline-primary fw-semibold">
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