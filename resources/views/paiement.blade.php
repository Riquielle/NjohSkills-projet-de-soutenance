@extends('Accueil.layouts.appp')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <img src="{{ asset('storage/'.$formation->image) }}" class="img-fluid h-100 w-100" style="object-fit:cover; min-height: 350px;">
                    </div>

                    <div class="col-lg-7">
                        <div class="card-body p-5">
                            <h2 class="mb-4">Paiement de la formation</h2>
                            <h4>{{ $formation->titre }}</h4>
                            <p class="text-muted">{{ $formation->description }}</p>
                            
                            <hr>
                            
                            <h3 class="text-primary">{{ number_format($formation->prix, 0, ',', ' ') }} FCFA</h3>
                            <p>Durée : <strong>{{ $formation->duree }}</strong></p>
                            
                            <hr>

                            <form action="{{ route('paiement.store', $formation->id) }}" method="POST">
                                @csrf

                                <h5 class="mb-3">Choisissez un moyen de paiement</h5>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="methode" id="om" value="Orange Money" checked>
                                    <label class="form-check-label" for="om">
                                        🟠 Orange Money
                                    </label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="methode" id="momo" value="Mobile Money">
                                    <label class="form-check-label" for="momo">
                                        🟡 MTN Mobile Money
                                    </label>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="methode" id="card" value="Carte Bancaire">
                                    <label class="form-check-label" for="card">
                                        💳 Carte Bancaire
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold">
                                    Payer maintenant
                                </button>
                            </form>

                            <a href="{{ route('details_formations', $formation->id) }}" class="btn btn-link w-100 text-muted mt-2 text-decoration-none small">
                            Annuler 
                        </a>
                        </div>
                    </div>
                </div> </div> </div>
    </div>
</div>
@endsection