@extends('Accueil.layouts.appp2')




@section('content')


<div class="container py-5">


<h2 class="fw-bold mb-4">

🏆 Mes certificats

</h2>



<div class="row">


@forelse($formations as $formation)


<div class="col-lg-4 mb-4">


<div class="card shadow border-0 h-100">



<img src="{{ asset('storage/'.$formation->image) }}"
class="card-img-top"
height="180"
style="object-fit:cover;">



<div class="card-body text-center">


<h5 class="fw-bold">

{{ $formation->titre }}

</h5>



<p class="text-muted">

👨‍🏫 {{ $formation->formateur->user->name }}

</p>



<span class="badge bg-success mb-3">

🎓 Formation terminée

</span>



<p>

Félicitations ! Vous avez validé cette formation.

</p>



<a href="#"
class="btn btn-outline-success w-100">


📄 Télécharger mon certificat


</a>



</div>


</div>


</div>



@empty


<div class="alert alert-info">

Vous n'avez pas encore obtenu de certificat.

<br>

Terminez une formation pour recevoir votre certificat.

</div>


@endforelse



</div>


</div>


@endsection