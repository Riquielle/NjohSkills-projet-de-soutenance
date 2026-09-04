@extends('admin.layout')

@section('title', 'Détails du paiement - SkillOra')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         EN-TÊTE
    ===================================================== --}}

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Détails du paiement
            </h2>

            <p class="text-muted mb-0">
                Consultez les informations relatives à cette transaction.
            </p>
        </div>

        <a
            href="{{ route('admin.paiements.index') }}"
            class="btn btn-outline-secondary"
        >
            <i class="fas fa-arrow-left me-2"></i>
            Retour aux paiements
        </a>

    </div>


    {{-- =====================================================
         INFORMATIONS PRINCIPALES
    ===================================================== --}}

    <div class="row g-4">


        {{-- =================================================
             PAIEMENT
        ================================================= --}}

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                        <div>

                            <h5 class="fw-bold mb-1">

                                <i class="fas fa-money-bill-wave text-primary me-2"></i>

                                Informations du paiement

                            </h5>

                            <p class="text-muted mb-0">
                                Transaction #{{ $paiement->id }}
                            </p>

                        </div>


                        {{-- STATUT --}}

                        @if($paiement->statut === 'paye')

                            <span class="badge bg-success fs-6 p-2">

                                <i class="fas fa-check-circle me-1"></i>

                                Payé

                            </span>

                        @elseif($paiement->statut === 'en_attente')

                            <span class="badge bg-warning text-dark fs-6 p-2">

                                <i class="fas fa-clock me-1"></i>

                                En attente

                            </span>

                        @else

                            <span class="badge bg-danger fs-6 p-2">

                                <i class="fas fa-times-circle me-1"></i>

                                Échec

                            </span>

                        @endif

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="row g-4">


                        {{-- MONTANT --}}

                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-1">
                                    Montant
                                </small>

                                <h4 class="fw-bold text-primary mb-0">

                                    {{ number_format(
                                        $paiement->montant,
                                        0,
                                        ',',
                                        ' '
                                    ) }}

                                    FCFA

                                </h4>

                            </div>

                        </div>


                        {{-- MÉTHODE --}}

                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-1">
                                    Méthode de paiement
                                </small>

                                <h6 class="fw-bold mb-0">

                                    @if($paiement->methode === 'orange_money')

                                        <i class="fas fa-mobile-alt text-warning me-2"></i>
                                        Orange Money

                                    @elseif($paiement->methode === 'mtn_money')

                                        <i class="fas fa-mobile-alt text-warning me-2"></i>
                                        MTN Mobile Money

                                    @elseif($paiement->methode === 'carte')

                                        <i class="fas fa-credit-card text-primary me-2"></i>
                                        Carte bancaire

                                    @else

                                        {{ ucfirst($paiement->methode) }}

                                    @endif

                                </h6>

                            </div>

                        </div>


                        {{-- RÉFÉRENCE --}}

                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-1">
                                    Référence de transaction
                                </small>

                                @if($paiement->reference)

                                    <strong class="text-break">
                                        {{ $paiement->reference }}
                                    </strong>

                                @else

                                    <span class="text-muted">
                                        Non disponible
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- DATE --}}

                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-1">
                                    Date du paiement
                                </small>

                                <strong>

                                    {{ $paiement->created_at->format('d/m/Y à H:i') }}

                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
             STATUT / AUTOMATISATION
        ================================================= --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">

                        <i class="fas fa-shield-alt text-primary me-2"></i>

                        État de la transaction

                    </h5>


                    @if($paiement->statut === 'paye')

                        <div class="text-center">

                            <div
                                class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3"
                                style="width:80px;height:80px;"
                            >

                                <i class="fas fa-check-circle text-success fa-2x"></i>

                            </div>

                            <h5 class="fw-bold text-success">
                                Paiement confirmé
                            </h5>

                            <p class="text-muted mb-0">

                                Le paiement a été confirmé automatiquement
                                par le système de paiement.

                            </p>

                        </div>


                    @elseif($paiement->statut === 'en_attente')

                        <div class="text-center">

                            <div
                                class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3"
                                style="width:80px;height:80px;"
                            >

                                <i class="fas fa-clock text-warning fa-2x"></i>

                            </div>

                            <h5 class="fw-bold text-warning">
                                Paiement en attente
                            </h5>

                            <p class="text-muted mb-0">

                                Le système attend la confirmation
                                du prestataire de paiement.

                            </p>

                        </div>


                    @else

                        <div class="text-center">

                            <div
                                class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3"
                                style="width:80px;height:80px;"
                            >

                                <i class="fas fa-times-circle text-danger fa-2x"></i>

                            </div>

                            <h5 class="fw-bold text-danger">
                                Paiement échoué
                            </h5>

                            <p class="text-muted mb-0">

                                La transaction n'a pas été confirmée
                                par le système de paiement.

                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- =================================================
             APPRENANT
        ================================================= --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-0">

                        <i class="fas fa-user-graduate text-primary me-2"></i>

                        Informations de l'apprenant

                    </h5>

                </div>


                <div class="card-body p-4">

                    <div class="d-flex align-items-center">

                        <div
                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                            style="width:55px;height:55px;font-size:22px;"
                        >

                            {{ strtoupper(
                                substr($paiement->apprenant->name, 0, 1)
                            ) }}

                        </div>


                        <div class="min-w-0">

                            <h5 class="fw-bold mb-1 text-break">

                                {{ $paiement->apprenant->name }}

                            </h5>

                            <p class="text-muted mb-0 text-break">

                                <i class="fas fa-envelope me-2"></i>

                                {{ $paiement->apprenant->email }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
             FORMATION
        ================================================= --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-0">

                        <i class="fas fa-book-open text-primary me-2"></i>

                        Formation concernée

                    </h5>

                </div>


                <div class="card-body p-4">

                    <h5 class="fw-bold">

                        {{ $paiement->formation->titre }}

                    </h5>

                    <p class="text-muted mb-2">

                        {{ $paiement->formation->duree }}

                    </p>

                    <span class="badge bg-primary">

                        {{ number_format(
                            $paiement->formation->prix,
                            0,
                            ',',
                            ' '
                        ) }}
                        FCFA

                    </span>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection