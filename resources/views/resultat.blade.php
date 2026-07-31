@extends('Accueil.layouts.appp')

@section('content')

<div class="container py-5">

<div class="card shadow">

<div class="card-body text-center">

@if($tentative->reussi)

<div class="display-1">

🎉

</div>

<h2 class="text-success">

Félicitations !

</h2>

@else

<div class="display-1">

😥

</div>

<h2 class="text-danger">

Quiz non réussi

</h2>


@endif

<hr>

<h3>

Votre note

</h3>

<h1 class="display-3">

{{ $tentative->note }} %

</h1>

@if($tentative->reussi)



<div class="alert alert-success">

Vous avez validé ce module.

</div>

<a href="{{ route(
        'ma_formation',
        $tentative->quiz->module->formation->id
    ) }}"
class="btn btn-success">

    Retour à la formation

</a>

@else
<div class="alert alert-danger">

    <strong>Vous n'avez pas obtenu la note minimale requise.</strong><br>

    Vous devez réussir ce quiz pour débloquer le module suivant.

</div>

<div class="d-flex justify-content-center gap-3">

    <a href="{{ route('ma_formation', $tentative->quiz->module->formation->id) }}"
       class="btn btn-outline-primary">

        📚 Retour à la formation

    </a>

    <a href="{{ route('passer', $tentative->quiz_id) }}"
       class="btn btn-danger">

        🔄 Repasser le quiz

    </a>

</div>


@endif



</div>

</div>

</div>

@endsection