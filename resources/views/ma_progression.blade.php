@extends('Accueil.layouts.appp2')


@section('content')


<div class="container py-5">


<h2 class="fw-bold mb-4">

📈 Ma progression

</h2>



@forelse($formations as $formation)


<div class="card shadow border-0 mb-4">


<div class="card-body">


<h4 class="fw-bold">

{{ $formation->titre }}

</h4>


<hr>



<div class="row text-center">


<div class="col-md-4">


<h2 class="text-primary">

{{ $formation->pivot->progression }}%

</h2>


<p class="text-muted">

Progression globale

</p>


</div>




<div class="col-md-4">


<h2 class="text-success">

{{ $formation->modulesValides }}

/

{{ $formation->modulesTotal }}

</h2>


<p class="text-muted">

Modules validés

</p>


</div>




<div class="col-md-4">


@if($formation->pivot->progression == 100)

<h2>

🎓

</h2>

<p class="text-success">

Formation terminée

</p>


@else

<h2>

⏳

</h2>


<p class="text-warning">

En cours

</p>


@endif


</div>



</div>



<hr>



<div class="progress">


<div class="progress-bar bg-success"

style="width:{{ $formation->pivot->progression }}%">

{{ $formation->pivot->progression }}%

</div>


</div>



</div>


</div>



@empty


<div class="alert alert-info">

Vous n'avez aucune formation.

</div>


@endforelse



</div>


@endsection