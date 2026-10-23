@extends('Accueil.layouts.appf')

@section('content')

<div class="container-fluid py-4">

    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-lg-3 mb-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <img src="https://via.placeholder.com/100"
                         class="rounded-circle mb-3">

                    <h5>Formateur</h5>

                    <p class="text-muted">
                        {{ $user->name }}
                    </p>

                    <p class="badge bg-primary">
                        Spécialité : {{ $formateur->specialite }}
                    </p>

                </div>

                <div class="list-group list-group-flush">

                    <a href="#" class="list-group-item list-group-item-action active">
                        Tableau de bord
                    </a>

                    <a href="{{ route('Mes_formations') }}" class="list-group-item list-group-item-action">
                        Mes formations
                    </a>


                    <a href="{{ route('mes_apprenants') }}" class="list-group-item list-group-item-action">
                        Mes apprenants
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        Évaluations
                    </a>

                    <!-- 🔥 CERTIFICATS AJOUTÉ -->
                    <a href="#" class="list-group-item list-group-item-action">
                        Certificats
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        Messages
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        Mon profil
                    </a>

                    

                </div>

            </div>

        </div>

        <!-- MAIN CONTENT -->
        <div class="col-lg-9">

            <!-- HEADER -->
            <div class="mb-4">

                <h2> {{ $user->name }} </h2>

                <p class="text-muted">
                    Bienvenue dans votre espace formateur - Spécialité :  {{ $formateur->specialite }}
                </p>

            </div>

            <div class="card border-0 shadow-sm mb-4 bg-light">
                <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                    <div>
                        <h5 class="mb-1"><i class="fas fa-robot text-success me-2"></i>Assistant IA formateur</h5>
                        <p class="text-muted mb-0">Préparez un quiz, un examen blanc, un plan de cours ou un guide de séance. Validez toujours le contenu avant diffusion.</p>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('assistant_formateur') }}" class="btn btn-outline-success">Ouvrir l’espace IA</a>
                        <button type="button" class="btn btn-success" data-assistant-toggle>Demander à l’IA</button>
                    </div>
                </div>
            </div>

            <!-- STATS -->
            <div class="row mb-4">

                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white shadow border-0">
                        <div class="card-body text-center">
                            <h3>{{ $formationsTotal }}</h3>
                            <p>Formations</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card bg-success text-white shadow border-0">
                        <div class="card-body text-center">
                            <h3>{{ $apprenantsTotal }}</h3>
                            <p>Apprenants</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card bg-warning text-white shadow border-0">
                        <div class="card-body text-center">
                            <h3>{{ number_format($revenus,0,',',' ') }}
                                FCFA</h3>
                            <p>Revenus</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- FORMATIONS -->
            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-white">
                    <h5>Mes formations: {{ $formateur->specialite }}</h5>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Apprenants</th>
                                <th>Statut</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($formations as $formation)

                            <tr>

                            <td>
                            {{ $formation->titre }}
                            </td>


                            <td>
                            {{ number_format($formation->prix,0,',',' ') }}
                            FCFA
                            </td>


                            <td>

                            {{ $formation->inscriptions_count }}

                            </td>


                            <td>

                             @if($formation->statut == 'publie')

                                <span class="badge bg-success">

                                    ✅ Publiée

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    📝 Brouillon

                                </span>

                            @endif


                            </td>


                            </tr>


                            @empty

                            <tr>

                            <td colspan="4" class="text-center">

                            Aucune formation créée.

                            </td>

                            </tr>


                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- ÉVALUATIONS -->
            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-white">
                    <h5>Évaluations des apprenants</h5>
                </div>

                <div class="card-body">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Apprenant</th>
                                <th>Formation</th>
                                <th>Note</th>
                                <th>Statut</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>Marie</td>
                                <td>Couture Débutant</td>
                                <td>16 / 20</td>
                                <td>
                                    <span class="badge bg-success">Validé</span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- 🔥 CERTIFICATS -->
           <div class="card shadow border-0">
    <div class="card-header bg-white">
        <h5>Certificats délivrés</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Apprenant</th>
                        <th>Formation</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($certificats as $certificat)
                        <tr>
                            <td>
                                {{ $certificat->user->name ?? 'Non renseigné' }}
                            </td>

                            <td>
                                {{ $certificat->formation->titre ?? 'Non renseignée' }}
                            </td>

                            <td>
                                {{ $certificat->created_at
                                    ? $certificat->created_at->format('d/m/Y')
                                    : 'Non renseignée' }}
                            </td>

                            <td>
                                <span class="badge bg-success">
                                    Délivré
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Aucun certificat délivré pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

        </div>

    </div>

</div>

@endsection
