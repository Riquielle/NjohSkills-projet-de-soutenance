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
            <div class="d-flex align-items-center mb-3">

                <a href="{{ route('details_formations', $formation->id) }}"
                    class="btn btn-outline-secondary rounded-circle me-3"
                    title="Retour"
                    style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

                    <i class="fas fa-arrow-left"></i>

                </a>

                <h2 class="fw-bold mb-0">
                    {{ $formation->titre }}
                </h2>

            </div>

            <p class="text-muted">
                Bienvenue dans votre espace de formation.
            </p>

            <hr>

            <h4 class="mb-4">
                Modules
            </h4>

            <div class="accordion" id="accordionModules">

                @forelse($formation->modules as $index => $module)

                    <div class="accordion-item mb-3 border rounded-3 shadow-sm">

                        <h2 class="accordion-header">
                            <button
                                class="accordion-button @if($index!=0) collapsed @endif d-flex align-items-center"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#module{{ $module->id }}"
                                @if(!$modulesDebloques[$module->id]) disabled @endif>

                                @if($quizReussis[$module->id])
                                    <span class="badge bg-success me-2">✔</span>
                                @elseif($modulesDebloques[$module->id])
                                    <span class="badge bg-warning text-dark me-2">▶</span>
                                @else
                                    <span class="badge bg-secondary me-2">🔒</span>
                                @endif

                                <strong>
                                    Module {{ $module->ordre }} :
                                    {{ $module->titre }}
                                </strong>
                                <div class="ms-3 flex-grow-1">

                                    <div class="progress" style="height:8px;">

                                        <div class="progress-bar
                                            @if($progressionsModules[$module->id]['pourcentage']==100)
                                            bg-success
                                            @elseif($progressionsModules[$module->id]['pourcentage']>=50)
                                            bg-warning
                                            @else
                                            bg-danger
                                            @endif"
                                            role="progressbar"
                                            style="width:{{ $progressionsModules[$module->id]['pourcentage'] }}%">
                                        </div>

                                    </div>

                                    <small class="text-muted">

                                        {{ $progressionsModules[$module->id]['terminees'] }}
                                        /
                                        {{ $progressionsModules[$module->id]['total'] }}
                                        ressources terminées
                                        ({{ $progressionsModules[$module->id]['pourcentage'] }}%)

                                    </small>

                                </div>
                            </button>
                        </h2>

                        @if($modulesDebloques[$module->id])

                            <div id="module{{ $module->id }}"
                                 class="accordion-collapse collapse @if($index==0) show @endif"
                                 data-bs-parent="#accordionModules">

                                <div class="accordion-body">

                                    <p class="text-muted">
                                        {{ $module->objectif }}
                                    </p>

                                    @forelse($module->lecons as $lecon)

                                        <div class="card mb-3 border-0 shadow-sm">
                                            <div class="card-body">
                                                <h5 class="mb-3">
                                                    📖 {{ $lecon->ordre }}.
                                                    {{ $lecon->titre }}
                                                </h5>

                                                <p class="text-muted mb-3">
                                                    {{ $lecon->description }}
                                                </p>

                                                @if($lecon->ressources->count())

                                                    <!-- Grille pour afficher les cartes ressources côte à côte -->
                                                    <div class="row">

                                                        @foreach($lecon->ressources as $ressource)

                                                            @php
                                                                $terminee = $ressource->progressions
                                                                            ->where('user_id', auth()->id())
                                                                            ->where('terminee', true)
                                                                            ->count() > 0;
                                                            @endphp

                                                            <div class="col-md-6 mb-3">

                                                                <div class="card h-100 border-0 shadow-sm">

                                                                    <div class="card-body d-flex flex-column justify-content-between">

                                                                        <div>
                                                                            <h6 class="fw-bold">
                                                                                {{ $ressource->nom }}
                                                                            </h6>

                                                                            @if($terminee)
                                                                                <span class="badge bg-success mb-3">
                                                                                    ✓ Terminée
                                                                                </span>
                                                                            @else
                                                                                <span class="badge bg-warning text-dark mb-3">
                                                                                    En cours
                                                                                </span>
                                                                            @endif

                                                                            @switch($ressource->type)

                                                                                {{-- ================= VIDEO ================= --}}
                                                                                @case('video')
                                                                                    <video
                                                                                        controls
                                                                                        controlsList="nodownload"
                                                                                        disablePictureInPicture
                                                                                        width="100%"
                                                                                        class="rounded video-player"
                                                                                        id="video{{ $ressource->id }}"
                                                                                        data-id="{{ $ressource->id }}"
                                                                                        data-terminee="{{ $terminee ? 1 : 0 }}">
                                                                                        <source src="{{ asset('storage/'.$ressource->fichier) }}">
                                                                                        Votre navigateur ne supporte pas la lecture vidéo.
                                                                                    </video>

                                                                                    @if($terminee)
                                                                                        <div class="mt-3">
                                                                                            <span class="badge bg-success fs-6">
                                                                                                <i class="fas fa-check-circle"></i> Vidéo terminée
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="alert alert-warning mt-3 mb-0">
                                                                                            <i class="fas fa-info-circle"></i> Regardez cette vidéo jusqu'à la fin.
                                                                                        </div>
                                                                                    @endif
                                                                                    @break

                                                                                {{-- ================= PDF ================= --}}
                                                                                @case('pdf')
                                                                                    <iframe
                                                                                        src="{{ asset('storage/'.$ressource->fichier) }}"
                                                                                        width="100%"
                                                                                        height="350"
                                                                                        class="border rounded pdf-player"
                                                                                        data-id="{{ $ressource->id }}"
                                                                                        data-terminee="{{ $terminee ? 1 : 0 }}">
                                                                                    </iframe>

                                                                                    @if($terminee)
                                                                                        <div class="mt-3">
                                                                                            <span class="badge bg-success">
                                                                                                ✓ PDF consulté
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="alert alert-warning mt-3 mb-0">
                                                                                            Lisez ce PDF quelques instants pour qu'il soit validé.
                                                                                        </div>
                                                                                    @endif
                                                                                    @break

                                                                                {{-- ================= AUDIO ================= --}}
                                                                                @case('audio')
                                                                                    <audio
                                                                                        controls
                                                                                        controlsList="nodownload"
                                                                                        class="w-100 audio-player"
                                                                                        id="audio{{ $ressource->id }}"
                                                                                        data-id="{{ $ressource->id }}"
                                                                                        data-terminee="{{ $terminee ? 1 : 0 }}">
                                                                                        <source src="{{ asset('storage/'.$ressource->fichier) }}">
                                                                                        Votre navigateur ne supporte pas l'audio.
                                                                                    </audio>

                                                                                    @if($terminee)
                                                                                        <div class="mt-3">
                                                                                            <span class="badge bg-success">
                                                                                                ✓ Audio terminé
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="mt-3">
                                                                                            <span class="badge bg-warning text-dark">
                                                                                                Écoutez l'audio jusqu'à la fin.
                                                                                            </span>
                                                                                        </div>
                                                                                    @endif
                                                                                    @break

                                                                                {{-- ================= IMAGE ================= --}}
                                                                                @case('image')
                                                                                    <img
                                                                                        src="{{ asset('storage/'.$ressource->fichier) }}"
                                                                                        class="img-fluid rounded shadow image-player"
                                                                                        data-id="{{ $ressource->id }}"
                                                                                        data-terminee="{{ $terminee ? 1 : 0 }}">

                                                                                    @if($terminee)
                                                                                        <div class="mt-3">
                                                                                            <span class="badge bg-success">
                                                                                                ✓ Image consultée
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="alert alert-warning mt-3 mb-0">
                                                                                            Cette image sera automatiquement validée.
                                                                                        </div>
                                                                                    @endif
                                                                                    @break

                                                                                {{-- ================= ZIP ================= --}}
                                                                                @case('zip')
                                                                                    <a href="{{ asset('storage/'.$ressource->fichier) }}" download class="btn btn-dark w-100">
                                                                                        📦 Télécharger l'archive
                                                                                    </a>

                                                                                    @if(!$terminee)
                                                                                        <form method="POST" action="{{ route('terminer',$ressource->id) }}" class="mt-3">
                                                                                            @csrf
                                                                                            <button class="btn btn-success w-100">
                                                                                                ✓ J'ai terminé cette ressource
                                                                                            </button>
                                                                                        </form>
                                                                                    @else
                                                                                        <button class="btn btn-outline-success mt-3 w-100" disabled>
                                                                                            ✓ Ressource terminée
                                                                                        </button>
                                                                                    @endif
                                                                                    @break

                                                                            @endswitch

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        @endforeach

                                                    </div> <!-- Fin row ressources -->

                                                @else
                                                    <div class="alert alert-warning mt-2">
                                                        Aucune ressource.
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                    @empty
                                        <div class="alert alert-info">
                                            Aucune leçon n'a encore été ajoutée.
                                        </div>
                                    @endforelse

                                    @if($module->quiz)
                                        <hr>

                                        @if($quizReussis[$module->id])


                                            <div class="alert alert-success shadow-sm border-0 rounded-4">

                                                <div class="d-flex align-items-center">

                                                    <div class="fs-1 me-3">
                                                        🎉
                                                    </div>

                                                    <div>

                                                        <h5 class="fw-bold mb-1">
                                                            Félicitations !
                                                        </h5>

                                                        <p class="mb-0">

                                                            Vous avez validé le quiz du module :

                                                            <strong>
                                                                {{ $module->titre }}
                                                            </strong>

                                                            <br>

                                                            Note obtenue :
                                                            <strong>
                                                                {{ $quizValides[$module->id]->note }}%
                                                            </strong>

                                                        </p>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="text-end mt-3">

                                                <a href="{{ route('resultat',$quizValides[$module->id]->id) }}"
                                                class="btn btn-outline-success">

                                                    📄 Voir le résultat

                                                </a>
                                                <a href="{{ route('historique',$module->quiz->id) }}"
                                                    class="btn btn-outline-primary">

                                                    📊 Historique des tentatives

                                                </a>

                                            </div>

                                            @elseif(isset($quizTentatives[$module->id]) 
                                                && $quizTentatives[$module->id]
                                                && !$quizTentatives[$module->id]->reussi)


                                                <div class="alert alert-warning shadow-sm border-0 rounded-4">

                                                    <div class="d-flex align-items-center">

                                                        <div class="fs-1 me-3">
                                                            ⚠️
                                                        </div>

                                                        <div>

                                                            <h5 class="fw-bold mb-1">
                                                                Quiz non validé
                                                            </h5>

                                                            <p class="mb-0">

                                                                Votre dernière note :
                                                                
                                                                <strong>
                                                                    {{ $quizTentatives[$module->id]->note }}%
                                                                </strong>

                                                                <br>

                                                                Vous devez réussir ce quiz pour continuer.

                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>


                                            <div class="text-end mt-3">

                                    

                                                    <a href="{{ route('resultat',$quizTentatives[$module->id]->id) }}"
                                                    class="btn btn-outline-secondary me-2">

                                                        📄 Voir mon résultat

                                                    </a>

                                                    <a href="{{ route('passer',$module->quiz->id) }}"
                                                    class="btn btn-danger">

                                                        🔄 Repasser

                                                    </a>

                                                    <a href="{{ route('historique',$module->quiz->id) }}"
                                                        class="btn btn-outline-primary">

                                                        📊 Historique

                                                    </a>

                                                </div>

                                            

                                            @elseif($modulesTermines[$module->id])

                                            <div class="text-end">

                                                <a href="{{ route('passer',$module->quiz->id) }}"
                                                class="btn btn-success">

                                                    📝 Passer le quiz

                                                </a>

                                            </div>

                                            @else

                                            <div class="alert alert-info">

                                                📚 Vous devez terminer toutes les ressources avant de passer le quiz.

                                            </div>

                                        @endif

                                    @endif
                                    
                                </div> 
                            <!-- fin accordion-body -->

                            </div>
                            <!-- fin accordion-collapse -->

                            @endif

                            </div>
                            <!-- fin accordion-item -->

                    

                @empty
                    <div class="alert alert-warning">
                        Aucun module disponible.
                    </div>
                @endforelse

            </div> <!-- fin accordionModules -->

        </div> <!-- fin col-lg-8 -->


        

        <!-- Carte à droite -->
        <div class="col-lg-4">
            <div class="card shadow-lg border-0 rounded-4 sticky-top"
                style="top:20px;">
                <img src="{{ asset('storage/'.$formation->image) }}"
                    class="card-img-top rounded-top-4"
                    style="height:230px;object-fit:cover;">

                <div class="card-body">
                    <h5>{{ $formation->titre }}</h5>
                    <hr>

                    <p><strong>Prix :</strong> {{ number_format($formation->prix,0,',',' ') }} FCFA</p>
                    <p><strong>Durée :</strong> {{ $formation->duree }}</p>

                     {{-- DURÉE DE LA FORMATION --}}

                    @if($inscription->progression < 100)

                        @if($joursRestants > 0)

                            <div class="alert alert-info">

                                <i class="fas fa-clock me-2"></i>

                                Il vous reste

                                <strong>
                                    {{ $joursRestants }} jours
                                </strong>

                                pour terminer cette formation.

                            </div>

                        @elseif($joursRestants == 0)

                            <div class="alert alert-warning">

                                <i class="fas fa-exclamation-triangle me-2"></i>

                                Votre formation se termine aujourd'hui.

                            </div>

                        @else

                            <div class="alert alert-danger">

                                <i class="fas fa-times-circle me-2"></i>

                                Votre période de formation est terminée.

                            </div>


                            {{-- PROLONGATION DISPONIBLE UNE SEULE FOIS --}}

                            @if(!$inscription->prolongee)

                                <div class="text-center mt-3">

                                    <p class="mb-2">

                                        Vous n'avez pas encore terminé votre formation.

                                    </p>

                                    <p class="small text-muted">

                                        Une prolongation de 7 jours vous est proposée.

                                    </p>

                                    <form
                                        action="{{ route('prolonger', $inscription->id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                            onclick="return confirm('Voulez-vous prolonger votre formation de 7 jours ?')"
                                        >

                                            <i class="fas fa-clock me-2"></i>

                                            Prolonger de 7 jours

                                        </button>

                                    </form>

                                </div>

                            @else

                                <div class="alert alert-secondary text-center">

                                    <i class="fas fa-info-circle me-2"></i>

                                    La prolongation de votre formation a déjà été utilisée.

                                </div>

                            @endif

                        @endif

                    @endif

                    
                
                    <p><strong>Formateur :</strong> {{ $formation->formateur->user->name }}</p>
                    <p><strong>Spécialité :</strong> {{ $formation->formateur->specialite }}</p>
                    <hr>

                    <h6 class="fw-bold mb-2">

                        Progression de la formation

                    </h6>

                    <div class="progress mb-3" style="height:25px;">

                        <div
                            class="progress-bar
                            @if($inscription->progression == 100)
                                bg-success
                            @elseif($inscription->progression >= 50)
                                bg-warning
                            @else
                                bg-primary
                            @endif"
                            role="progressbar"
                            style="width: {{ $inscription->progression }}%;"
                            aria-valuenow="{{ $inscription->progression }}"
                            aria-valuemin="0"
                            aria-valuemax="100">

                            {{ $inscription->progression }} %

                        </div>

                    </div>

                    @if($inscription->progression == 100)

                        <div class="alert alert-success mt-4 text-center">

                            <h4>

                                🎉 Formation terminée

                            </h4>

                            <p>

                                Félicitations ! Vous avez validé tous les modules.

                            </p>

                            <a href="{{ route('certificat',$formation->id) }}"
                            class="btn btn-success">

                                📜 Télécharger mon certificat

                            </a>

                        </div>

                    @else

                        <button class="btn btn-outline-success w-100" disabled>

                            📚 Formation en cours

                        </button>

                    @endif
                </div>
            </div>
        </div> <!-- fin col-lg-4 -->

    </div> <!-- fin row -->

</div> <!-- fin container -->

<script>
function terminerRessource(id){
    fetch("{{ url('/ressource') }}/" + id + "/terminer", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        }
    })
    .then(response => {
        if(!response.ok){
            throw new Error("Erreur lors de la validation");
        }
        return response.json();
    })
    .then(data => {
        if(data.success){
            location.reload();
        }
    })
    .catch(error => {
        console.error(error);
        alert("Une erreur est survenue.");
    });
}

// ==================== VIDEO ====================
let dernierePosition = {};
document.querySelectorAll('.video-player').forEach(video => {
    dernierePosition[video.dataset.id] = 0;

    video.addEventListener('timeupdate', function(){
        dernierePosition[video.dataset.id] = video.currentTime;
    });

    video.addEventListener('seeking', function(){
        if(video.currentTime > dernierePosition[video.dataset.id] + 5){
            video.currentTime = dernierePosition[video.dataset.id];
        }
    });

    video.addEventListener('ended', function(){
        terminerRessource(video.dataset.id);
    });
});

// ==================== AUDIO ====================
document.querySelectorAll(".audio-player").forEach(function(audio){
    if(audio.dataset.terminee == "1") return;

    audio.addEventListener("ended", function(){
        terminerRessource(audio.dataset.id);
    });
});

// ================= IMAGE =================
document.querySelectorAll(".image-player").forEach(function(img){
    if(img.dataset.terminee=="1") return;

    img.addEventListener("load",function(){
        setTimeout(function(){
            terminerRessource(img.dataset.id);
        },8000);
    });
});

// ================= PDF =================
document.querySelectorAll(".pdf-player").forEach(function(pdf){
    if(pdf.dataset.terminee=="1") return;

    pdf.addEventListener("load",function(){
        setTimeout(function(){
            terminerRessource(pdf.dataset.id);
        },20000);
    });
});
</script>

@endsection