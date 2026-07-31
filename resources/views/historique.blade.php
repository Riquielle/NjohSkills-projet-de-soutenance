@extends('Accueil.layouts.appp')

@section('content')

<div class="container py-5">

    <!-- En-tête -->
    <div class="d-flex align-items-center mb-4">

        <!-- Bouton retour -->
        <a href="{{ route('ma_formation', $quiz->module->formation->id) }}"
        class="btn btn-outline-secondary rounded-circle me-3"
        title="Retour"
        style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

            <i class="fas fa-arrow-left"></i>

        </a>

        <!-- Titre -->
        <div>

            <h2 class="fw-bold mb-1">
                📊 Historique des tentatives
            </h2>

            <p class="text-muted mb-0">
                <strong>Quiz :</strong> {{ $quiz->titre }}
            </p>

        </div>

    </div>

    <!-- Résumé -->
    @if($tentatives->count())

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm text-center">

                <div class="card-body">

                    <h2 class="text-primary">

                        {{ $tentatives->total() }}

                    </h2>

                    <p class="mb-0">

                        Tentative(s)

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm text-center">

                <div class="card-body">

                    <h2 class="text-success">

                        {{ $meilleureNote }}%

                    </h2>

                    <p class="mb-0">

                        Meilleure note

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm text-center">

                <div class="card-body">

                    <h2>

                        @if($tentatives->contains('reussi',true))

                            🏆

                        @else

                            📚

                        @endif

                    </h2>

                    <p class="mb-0">

                        @if($tentatives->contains('reussi',true))

                            Quiz validé

                        @else

                            En cours

                        @endif

                    </p>

                </div>

            </div>

        </div>

    </div>

    @endif

    <!-- Historique -->

    <div class="card shadow border-0">

        <div class="card-body">

            @forelse($tentatives as $index=>$tentative)

            <div class="card border-0 shadow-sm mb-3">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-1">

                                Tentative {{ ($tentatives->currentPage()-1) * $tentatives->perPage() + $loop->iteration }}

                            </h5>

                            <small class="text-muted">

                                {{ $tentative->created_at->format('d/m/Y à H:i') }}

                            </small>

                        </div>

                        @if($tentative->reussi)

                            <span class="badge bg-success px-3 py-2">

                                ✅ Réussie

                            </span>

                        @else

                            <span class="badge bg-danger px-3 py-2">

                                ❌ Échec

                            </span>

                        @endif

                    </div>

                    <hr>

                    <div class="row align-items-center">

                        <div class="col-md-3">

                            <h3 class="fw-bold text-primary">

                                {{ $tentative->note }}%

                            </h3>

                            <small class="text-muted">

                                Note obtenue

                            </small>

                        </div>

                        <div class="col-md-9">

                            <div class="progress" style="height:12px;">

                                <div class="progress-bar

                                    @if($tentative->reussi)

                                        bg-success

                                    @else

                                        bg-danger

                                    @endif"

                                    style="width:{{ $tentative->note }}%">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="alert alert-info text-center">

                <h5>

                    📚 Aucune tentative enregistrée

                </h5>

                <p class="mb-0">

                    Vous n'avez pas encore passé ce quiz.

                </p>

            </div>

            @endforelse
            
            <div class="d-flex justify-content-center mt-4">

                {{ $tentatives->links() }}

            </div>

        </div>

    </div>

</div>

@endsection