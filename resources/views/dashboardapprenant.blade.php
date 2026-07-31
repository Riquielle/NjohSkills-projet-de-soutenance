

@extends('Accueil.layouts.appp2')



@section('content')

<div class="container py-5">

    <h2 class="fw-bold">

        Hello {{ $user->name }} 👋

    </h2>

    <p class="text-muted">

        Bienvenue dans votre tableau de bord.

    </p>

    <div class="row mt-4">

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow text-center">

                <div class="card-body">

                    <h1 class="text-primary">

                        📚

                    </h1>

                    <h3>{{ $formationsTotal }}</h3>

                    <p class="text-muted mb-0">

                        Mes formations

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow text-center">

                <div class="card-body">

                    <h1 class="text-warning">

                        ⏳

                    </h1>

                    <h3>{{ $formationsEnCours }}</h3>

                    <p class="text-muted mb-0">

                        En cours

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow text-center">

                <div class="card-body">

                    <h1 class="text-success">

                        ✅

                    </h1>

                    <h3>{{ $formationsTerminees }}</h3>

                    <p class="text-muted mb-0">

                        Terminées

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow text-center">

                <div class="card-body">

                    <h1 class="text-info">

                        📈

                    </h1>

                    <h3>{{ $progressionMoyenne }}%</h3>

                    <p class="text-muted mb-0">

                        Progression moyenne

                    </p>

                </div>

            </div>

        </div>

    </div>

    <hr class="my-5">
    <h4 class="fw-bold mb-4">

        Continuer mes formations 📚

    </h4>


    <div class="row">


    @forelse($formations->where('pivot.progression','<',100) as $formation)


    <div class="col-lg-4 mb-4">


    <div class="card shadow border-0 h-100">


    <img src="{{ asset('storage/'.$formation->image) }}"
    class="card-img-top"
    height="180"
    style="object-fit:cover;">


    <div class="card-body">


    <h5 class="fw-bold">

    {{ $formation->titre }}

    </h5>


    <p class="text-muted">

    👨‍🏫 {{ $formation->formateur->user->name }}

    </p>



    <div class="progress mb-3">


    <div class="progress-bar"
    style="width: {{ $formation->pivot->progression }}%">

    {{ $formation->pivot->progression }}%

    </div>


    </div>



    <span class="badge bg-warning text-dark mb-3">

    ⏳ Formation en cours

    </span>



    <a href="{{ route('ma_formation',$formation->id) }}"
    class="btn btn-success w-100">

    Continuer

    </a>


    </div>


    </div>


    </div>


    @empty


    <div class="alert alert-success">

    🎉 Vous avez terminé toutes vos formations !

    </div>


    @endforelse


    </div>

</div>

@endsection