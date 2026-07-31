@extends('Accueil.layouts.appf')

@section('content')

<div class="container-fluid py-4">

    {{-- En-tête --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                👤 {{ $user->name }}

            </h2>

            <p class="text-muted mb-0">

                Formation : {{ $formation->titre }}

            </p>

        </div>

        <a href="{{ route('mes_apprenants') }}"
           class="btn btn-outline-secondary">

            ← Retour aux apprenants

        </a>

    </div>

    {{-- Carte principale --}}
    <div class="card shadow border-0">

        <div class="card-body">

            {{-- Résumé --}}
            <div class="row mb-5">

                <div class="col-md-3">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h1>📈</h1>

                            <h3>{{ $inscription->progression }}%</h3>

                            <p class="text-muted mb-0">

                                Progression

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h1>📚</h1>

                            <h3>{{ $modules->count() }}</h3>

                            <p class="text-muted mb-0">

                                Modules

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h1>✅</h1>

                            <h3>

                                {{ $quizTentatives->where('reussi',true)->count() }}

                            </h3>

                            <p class="text-muted mb-0">

                                Quiz réussis

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="card border-0 shadow-sm text-center">

                        <div class="card-body">

                            <h1>🏆</h1>

                            <h3>

                                @if($inscription->progression==100)

                                    Oui

                                @else

                                    Non

                                @endif

                            </h3>

                            <p class="text-muted mb-0">

                                Certificat

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Timeline --}}
            <h4 class="fw-bold mb-4">

                Parcours de l'apprenant

            </h4>

            <div class="timeline">

                @foreach($modules as $module)

                    @php

                        $tentative = $module->quiz
                            ? $quizTentatives->get($module->quiz->id)
                            : null;

                    @endphp

                    <div class="timeline-item">

                        <div class="timeline-icon">

                            @if(!$module->quiz)

                                📖

                            @elseif($tentative && $tentative->reussi)

                                ✅

                            @elseif($tentative)

                                ❌

                            @else

                                ⏳

                            @endif

                        </div>

                        <div class="timeline-content">

                            <h5>

                                Module {{ $module->ordre }}

                                :

                                {{ $module->titre }}

                            </h5>

                            <p class="text-muted">

                                {{ $module->lecons->count() }}

                                leçon(s)

                            </p>

                            <p>

                                📂 Ressources :

                                {{ $module->ressourcesTerminees }}

                                /

                                {{ $module->totalRessources }}

                            </p>

                            <div class="progress mb-3">

                                <div class="progress-bar bg-success"

                                     style="width:{{ $module->progression }}%">

                                    {{ $module->progression }}%

                                </div>

                            </div>

                            @if($tentative)

                                <p>

                                    📝 Note :

                                    <strong>

                                        {{ $tentative->note }} %

                                    </strong>

                                </p>

                                <p class="text-muted">

                                    {{ $tentative->date_passage }}

                                </p>

                            @endif

                            @if($module->progression==100 && $tentative && $tentative->reussi)

                                <span class="badge bg-success">

                                    ✔ Module validé

                                </span>

                            @elseif($module->progression>0)

                                <span class="badge bg-warning text-dark">

                                    En cours

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Non commencé

                                </span>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    {{-- Navigation --}}
    <div class="d-flex justify-content-between mt-4">

        @if($precedent)

            <a href="{{ route('voir_ap',$precedent) }}"
               class="btn btn-outline-primary">

                ⬅ Précédent

            </a>

        @else

            <span></span>

        @endif

        @if($suivant)

            <a href="{{ route('voir_ap',$suivant) }}"
               class="btn btn-primary">

                Suivant ➜

            </a>

        @endif

    </div>

</div>

@endsection