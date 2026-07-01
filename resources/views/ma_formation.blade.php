@extends('Accueil.layouts.appp')

@section('content')

<div class="container py-5">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="row">

<!-- Partie gauche -->

<div class="col-lg-8">

<h2 class="fw-bold">

{{ $formation->titre }}

</h2>

<p class="text-muted">

Bienvenue dans votre espace de formation.

</p>

<hr>

<h4 class="mb-4">

Modules

</h4>

<div class="accordion" id="accordionModules">
    @forelse ($formation->modules as $index => $module)
        <div class="accordion-item mb-3 border rounded-3 shadow-sm overflow-hidden">
            <h2 class="accordion-header">
                <button class="accordion-button @if($index !== 0) collapsed @endif fw-semibold" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#module-{{ $module->id }}" 
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                        aria-controls="module-{{ $module->id }}">
                    Module {{ $index + 1 }} : {{ $module->titre }}
                </button>
            </h2>
            
            <div id="module-{{ $module->id }}" 
                 class="accordion-collapse collapse @if($index === 0) show @endif" 
                 data-bs-parent="#accordionModules">
                <div class="accordion-body bg-light text-secondary lh-lg">
                    Aucune leçon  n'a encore été ajouté à ce module
                    
                    {{-- Si vous avez des leçons ou vidéos rattachées au module, vous pouvez les lister ici --}}
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center py-4 rounded-3">
            <i class="bi bi-exclamation-triangle"></i> Aucun module n'a encore été ajouté à cette formation par le formateur.
        </div>
    @endforelse
</div>

</div>

<!-- Carte à droite -->

<div class="col-lg-4">

<div class="card shadow border-0 sticky-top">

<img src="{{ asset('storage/'.$formation->image) }}"
class="card-img-top">

<div class="card-body">

<h5>

{{ $formation->titre }}

</h5>

<hr>

<p>

<strong>Prix :</strong>

{{ number_format($formation->prix,0,',',' ') }} FCFA

</p>

<p>

<strong>Durée :</strong>

{{ $formation->duree }}

</p>

<p>

<strong>Formateur :</strong>

{{ $formation->formateur->user->name }}

</p>

<p>

<strong>Spécialité :</strong>

{{ $formation->formateur->specialite }}

</p>

<hr>



<div class="progress mb-3">
    <div class="progress-bar"
         style="width:{{ $inscription->progression }}%">
        {{ $inscription->progression }} %
    </div>
</div>



<button class="btn btn-success w-100">

Commencer la formation

</button>

</div>

</div>

</div>

</div>

</div>

@endsection
