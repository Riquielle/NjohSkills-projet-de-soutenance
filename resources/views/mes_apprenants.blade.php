@extends('Accueil.layouts.appf')


@section('content')


<div class="container-fluid py-5">

   <div class="d-flex align-items-center mb-4">

    <a href="{{ route('dashboard_fo') }}"
       class="btn btn-outline-secondary rounded-circle me-3"
       title="Retour"
       style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

        <i class="fas fa-arrow-left"></i>

    </a>

    <h2 class="fw-bold mb-0">

        👨‍🎓 Mes apprenants

    </h2>

</div>


<div class="card shadow border-0">


<div class="card-body table-responsive">


<table class="table table-hover">


<thead>

<tr>

<th>
Apprenant
</th>


<th>
Formation
</th>


<th>
Progression
</th>


<th>
Statut
</th>


<th>
Action
</th>


</tr>

</thead>



<tbody>



@forelse($inscriptions as $inscription)



<tr>


<td>

{{ $inscription->user->name }}

</td>



<td>

{{ $inscription->formation->titre }}

</td>



<td>


<div class="progress">

<div class="progress-bar"

style="width:{{ $inscription->progression }}%">

{{ $inscription->progression }}%

</div>

</div>


</td>



<td>


@if($inscription->progression == 100)

<span class="badge bg-success">

Formation terminée

</span>


@else

<span class="badge bg-warning text-dark">

En cours

</span>


@endif


</td>



<td>


<a href="{{ route(
'voir_ap',
$inscription->id
) }}"
class="btn btn-outline-primary btn-sm">

Voir

</a>


</td>



</tr>



@empty


<tr>

<td colspan="5"
class="text-center">


Aucun apprenant inscrit.


</td>


</tr>


@endforelse



</tbody>


</table>

<div class="d-flex justify-content-between align-items-center mt-4">

    <small class="text-muted">

        Affichage de

        {{ $inscriptions->firstItem() }}

        à

        {{ $inscriptions->lastItem() }}

        sur

        {{ $inscriptions->total() }}

        apprenants.

    </small>

    {{ $inscriptions->links() }}

</div>


</div>


</div>



</div>


@endsection