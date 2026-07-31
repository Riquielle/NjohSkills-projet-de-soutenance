@extends('Accueil.layouts.appp2')


@section('content')


<div class="container py-5">


<h2 class="fw-bold mb-4">

📚 Mes formations

</h2>



<div class="row">


@forelse($formations as $formation)



<div class="col-lg-4 col-md-6 mb-4">


<div class="card shadow border-0 h-100">



<img src="{{ asset('storage/'.$formation->image) }}"
class="card-img-top"
height="200"
style="object-fit:cover">



<div class="card-body">


<h5 class="fw-bold">

{{ $formation->titre }}

</h5>


<p class="text-muted">

👨‍🏫 
{{ $formation->formateur->user->name }}

</p>



<p>

⏱ Durée :

{{ $formation->duree }}

</p>



<hr>


<div class="progress mb-3">


<div class="progress-bar"

style="width:{{ $formation->pivot->progression }}%">


{{ $formation->pivot->progression }}%


</div>


</div>



@if($formation->pivot->progression == 100)


<span class="badge bg-success mb-3">

🎓 Formation terminée

</span>


<br>


<a href="#"
class="btn btn-outline-success w-100">

🏆 Télécharger mon certificat

</a>


@else


<span class="badge bg-warning text-dark mb-3">

⏳ Formation en cours

</span>


<br>


<a href="{{ route('ma_formation',$formation->id) }}"
class="btn btn-primary w-100">

Continuer la formation

</a>


@endif



</div>


</div>


</div>



@empty


<div class="alert alert-info">

Vous n'avez aucune formation actuellement.

</div>


@endforelse



</div>


</div>


@endsection