@extends('Accueil.layouts.appf')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="d-flex align-items-center">

            <!-- Retour -->

            <a href="{{ route('lecons', $lecon->module_id) }}"
               class="btn btn-light border rounded-circle me-3"
               style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;">

                <i class="fas fa-arrow-left"></i>

            </a>

            <div>

                <h2 class="fw-bold mb-1">

                    Ressources de la leçon

                </h2>

                <p class="text-muted mb-0">

                    {{ $lecon->titre }}

                </p>

            </div>

        </div>

        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#addRessource">

            + Ajouter une ressource

        </button>

    </div>

    @if (Session::has('success'))
						<div class="alert alert-success text-center">
							{{ Session::get('success') }}
						</div>
					@endif

					@if (Session::has('error'))
						<div class="alert alert-danger text-center">
							{{ Session::get('error') }}
						</div>
					@endif

    <div class="card shadow border-0">

        <div class="card-body">

            @forelse($ressources as $ressource)

            <div class="border rounded p-4 mb-3">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h5>

                            @switch($ressource->type)

                                @case('video')
                                    🎥
                                    @break

                                @case('pdf')
                                    📄
                                    @break

                                @case('audio')
                                    🎵
                                    @break

                                @case('image')
                                    🖼️
                                    @break

                                @case('zip')
                                    📦
                                    @break

                                @default
                                    📁

                            @endswitch

                            {{ $ressource->nom }}

                        </h5>

                        <small class="text-muted">

                            {{ strtoupper($ressource->type) }}

                        </small>

                    </div>

                    <div>

                        <a href="{{ asset('storage/'.$ressource->fichier) }}"
                           target="_blank"
                           class="btn btn-success btn-sm">

                            Ouvrir

                        </a>

                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#edit{{ $ressource->id }}">

                            Modifier

                        </button>

                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#delete{{ $ressource->id }}">

                            Supprimer

                        </button>

                    </div>

                </div>

            </div>

            <!-- ================= MODIFIER ================= -->

            <div class="modal fade"
                 id="edit{{ $ressource->id }}"
                 tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="POST"
                              enctype="multipart/form-data"
                              action="{{ route('ressources.update',$ressource->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="modal-header">

                                <h5>

                                    Modifier une ressource

                                </h5>

                            </div>

                            <div class="modal-body">

                                <div class="mb-3">

                                    <label class="form-label">

                                        Nom de la ressource

                                    </label>

                                    <input type="text"
                                        name="nom"
                                        class="form-control"
                                        value="{{ $ressource->nom }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">

                                        Ressource actuelle

                                    </label>

                                    <div class="alert alert-light border">

                                        @switch($ressource->type)

                                            @case('video')
                                                🎥
                                                @break

                                            @case('pdf')
                                                📄
                                                @break

                                            @case('audio')
                                                🎵
                                                @break

                                            @case('image')
                                                🖼️
                                                @break

        

                                            @case('zip')
                                                📦
                                                @break

                                            @default
                                                📁

                                        @endswitch

                                        {{ basename($ressource->fichier) }}

                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">

                                        Remplacer le fichier (facultatif)

                                    </label>

                                    <div id="drop-zone-{{ $ressource->id }}"
                                        class="drop-zone">

                                        <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>

                                        <h5>

                                            Déposez un nouveau fichier ici

                                        </h5>

                                        <p class="text-muted">

                                            ou cliquez pour en choisir un

                                        </p>

                                        <input type="file"
                                            name="fichier"
                                            id="fichier-{{ $ressource->id }}"
                                            accept=".pdf,.mp4,.avi,.mov,.mkv,.webm,.mp3,.wav,.ogg,.aac,.jpg,.jpeg,.png,.gif,.webp,.zip,.rar"
                                            hidden>

                                        <button type="button"
                                                class="btn btn-outline-primary mt-2"
                                                id="browse-{{ $ressource->id }}">

                                            Choisir un fichier

                                        </button>
                                        <div class="alert alert-info mt-3">
                                            <strong>Conseil :</strong><br>

                                            Pour les documents de cours, veuillez convertir vos fichiers Word, Excel ou PowerPoint en <strong>PDF</strong> avant de les importer.
                                        </div>

                                    </div>

                                </div>

                                <div id="preview-{{ $ressource->id }}"></div>

                            </div>

                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">

                                    Annuler

                                </button>

                                <button class="btn btn-warning">

                                    Mettre à jour

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <!-- ================= SUPPRIMER ================= -->

            <div class="modal fade"
                 id="delete{{ $ressource->id }}"
                 tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="POST"
                              action="{{ route('ressources.destroy',$ressource->id) }}">

                            @csrf
                            @method('DELETE')

                            <div class="modal-header">

                                <h5>

                                    Confirmation

                                </h5>

                            </div>

                            <div class="modal-body">

                                Voulez-vous supprimer cette ressource ?

                            </div>

                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">

                                    Annuler

                                </button>

                                <button class="btn btn-danger">

                                    Supprimer

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            @empty

            <div class="alert alert-info">

                Aucune ressource disponible.

            </div>

            @endforelse

        </div>

    </div>

</div>


<!-- ================= AJOUT ================= -->

<div class="modal fade"
     id="addRessource"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="POST"
                  enctype="multipart/form-data"
                  action="{{ route('ressources.store',$lecon->id) }}">

                @csrf

                <div class="modal-header">

                    <h5>

                        Ajouter une ressource

                    </h5>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Nom</label>

                        <input type="text"
                               name="nom"
                               class="form-control">

                    </div>

                    

                    <div class="mb-3">

                        <label class="form-label">

                            Ressource pédagogique

                        </label>

                        <div id="drop-zone" class="drop-zone">

                            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>

                            <h5>Glissez votre fichier ici</h5>

                            <p class="text-muted">

                                ou cliquez pour sélectionner un fichier

                            </p>

                            <input type="file"
                                name="fichier"
                                id="fichier"
                                accept=".pdf,.mp4,.avi,.mov,.mkv,.webm,.mp3,.wav,.ogg,.aac,.jpg,.jpeg,.png,.gif,.webp,.zip,.rar"
                                hidden>

                            <button type="button"
                                    class="btn btn-outline-primary mt-2"
                                    id="browse">

                                Choisir un fichier

                            </button>
                            <div class="alert alert-info mt-3">
                                <strong>Conseil :</strong><br>

                                Pour les documents de cours, veuillez convertir vos fichiers Word, Excel ou PowerPoint en <strong>PDF</strong> avant de les importer.
                            </div>
                        </div>

                    </div>

                    <div id="preview"></div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Annuler

                    </button>

                    <button class="btn btn-primary">

                        Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>




<script>

const zone=document.getElementById('drop-zone');

const browse=document.getElementById('browse');

const input=document.getElementById('fichier');

const preview=document.getElementById('preview');

browse.onclick=()=>input.click();

zone.onclick=()=>input.click();

zone.addEventListener('dragover',(e)=>{

    e.preventDefault();

    zone.classList.add('dragover');

});

zone.addEventListener('dragleave',()=>{

    zone.classList.remove('dragover');

});

zone.addEventListener('drop',(e)=>{

    e.preventDefault();

    zone.classList.remove('dragover');

    input.files=e.dataTransfer.files;

    afficherFichier();

});

input.onchange=afficherFichier;

function afficherFichier(){

    if(!input.files.length) return;

    let file=input.files[0];
    const extension = file.name.split('.').pop().toLowerCase();

    const extensionsInterdites = [
        "doc",
        "docx",
        "xls",
        "xlsx",
        "ppt",
        "pptx"
    ];

    if(extensionsInterdites.includes(extension)){

        preview.innerHTML = `

            <div class="alert alert-danger">

                <strong>Format non autorisé !</strong><br>

                Les fichiers Word, Excel et PowerPoint ne sont plus acceptés.

                <hr>

                Veuillez convertir votre document en <strong>PDF</strong> avant de l'importer.

            </div>

        `;

        input.value="";

        return;

    }

    let icon="fa-file";

    if(file.type.startsWith("video"))

        icon="fa-video";

    else if(file.type.startsWith("audio"))

        icon="fa-music";

    else if(file.type.startsWith("image"))

        icon="fa-image";

    else if(file.type==="application/pdf")

        icon="fa-file-pdf";



    else if(file.name.endsWith(".zip") || file.name.endsWith(".rar"))

        icon="fa-file-archive";

    preview.innerHTML=`

    <div class="preview-card">

        <i class="fas ${icon} text-primary"></i>

        <h5>${file.name}</h5>

        <p class="text-muted">

            ${(file.size/1024/1024).toFixed(2)} Mo

        </p>

    </div>

    `;

}

</script>
<script>

document.querySelectorAll(".drop-zone").forEach(function(zone){

    let id = zone.id.replace("drop-zone-","");

    let input = document.getElementById("fichier-"+id);

    let browse = document.getElementById("browse-"+id);

    let preview = document.getElementById("preview-"+id);

    browse.onclick = () => input.click();

    zone.onclick = () => input.click();

    zone.addEventListener("dragover",function(e){

        e.preventDefault();

        zone.classList.add("dragover");

    });

    zone.addEventListener("dragleave",function(){

        zone.classList.remove("dragover");

    });

    zone.addEventListener("drop",function(e){

        e.preventDefault();

        zone.classList.remove("dragover");

        input.files = e.dataTransfer.files;

        afficher(input,preview);

    });

    input.onchange=function(){

        afficher(input,preview);

    };

});

function afficher(input,preview){

    if(input.files.length==0) return;

    let file=input.files[0];
    const extension = file.name.split('.').pop().toLowerCase();

    const extensionsInterdites = [
        "doc",
        "docx",
        "xls",
        "xlsx",
        "ppt",
        "pptx"
    ];

    if(extensionsInterdites.includes(extension)){

        preview.innerHTML = `

            <div class="alert alert-danger">

                <strong>Format non autorisé !</strong><br>

                Les fichiers Word, Excel et PowerPoint doivent être convertis en PDF.

            </div>

        `;

        input.value="";

        return;

    }

    let icon="fa-file";

    if(file.type.startsWith("video"))

        icon="fa-video";

    else if(file.type.startsWith("audio"))

        icon="fa-music";

    else if(file.type.startsWith("image"))

        icon="fa-image";

    else if(file.type=="application/pdf")

        icon="fa-file-pdf";


    else if(file.name.endsWith(".zip") || file.name.endsWith(".rar"))

        icon="fa-file-archive";

    preview.innerHTML = `

        <div class="preview-card">

            <i class="fas ${icon} text-primary"></i>

            <h5>${file.name}</h5>

            <small>${(file.size/1024/1024).toFixed(2)} Mo</small>

        </div>

    `;

}

</script>

@endsection
