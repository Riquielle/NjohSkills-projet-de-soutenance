@extends('Accueil.layouts.appf')

@section('content')

<style>

    /* =========================================================
       RESPONSIVE - PAGE MES FORMATIONS
       ========================================================= */

    * {
        box-sizing: border-box;
    }

    /* Évite les débordements horizontaux */
    html,
    body {
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Conteneur principal */
    .formations-page {
        width: 100%;
        max-width: 100%;
    }

    /* =========================================================
       EN-TÊTE
       ========================================================= */

    .formations-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .formations-title {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .formations-title h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
    }

    .back-button {
        width: 45px;
        height: 45px;

        min-width: 45px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
    }

    .add-formation-btn {
        white-space: nowrap;
    }


    /* =========================================================
       ALERTES
       ========================================================= */

    .formations-alert {
        width: 100%;
        margin-bottom: 20px;
    }


    /* =========================================================
       CARD
       ========================================================= */

    .formations-card {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
    }

    .formations-card .card-body {
        width: 100%;
        max-width: 100%;
    }


    /* =========================================================
       TABLEAU
       ========================================================= */

    .formations-table-container {
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: hidden;

        -webkit-overflow-scrolling: touch;
    }

    .formations-table {
        width: 100%;
        min-width: 850px;
        margin-bottom: 0;
    }

    .formations-table th,
    .formations-table td {
        vertical-align: middle;
        white-space: nowrap;
    }

    .formations-table td:nth-child(2) {
        white-space: normal;
        min-width: 180px;
        max-width: 250px;
    }


    /* =========================================================
       TITRE DE FORMATION
       ========================================================= */

    .formation-title-cell {
        word-break: break-word;
        overflow-wrap: anywhere;
    }

    .formation-title-cell strong {
        display: inline-block;
        max-width: 100%;
    }


    /* =========================================================
       BADGES
       ========================================================= */

    .formation-status {
        display: inline-block;
        margin-top: 7px;
    }


    /* =========================================================
       BOUTONS ACTIONS
       ========================================================= */

    .formation-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        flex-wrap: wrap;
    }

    .formation-actions .btn {
        white-space: nowrap;
    }


    /* =========================================================
       MODALES
       ========================================================= */

    .modal-dialog {
        max-width: 600px;
        width: calc(100% - 30px);
        margin-left: auto;
        margin-right: auto;
    }

    .modal-content {
        max-width: 100%;
        overflow: hidden;
    }

    .modal-body {
        max-width: 100%;
    }

    .modal-body input,
    .modal-body textarea,
    .modal-body select {
        width: 100%;
        max-width: 100%;
    }

    .modal-body textarea {
        resize: vertical;
    }

    .formation-preview-image {
        display: block;
        width: 100px;
        max-width: 100%;
        height: auto;
        object-fit: cover;
        margin-top: 8px;
    }

    .modal-footer {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }


    /* =========================================================
       PAGINATION
       ========================================================= */

    .formations-pagination {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 25px;
        overflow-x: auto;
        padding-bottom: 5px;
    }

    .formations-pagination nav {
        max-width: 100%;
    }

    .formations-pagination .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }


    /* =========================================================
       TABLETTES
       ========================================================= */

    @media (max-width: 991px) {

        .formations-page {
            padding-top: 35px !important;
            padding-bottom: 35px !important;
        }

        .formations-title h2 {
            font-size: 25px;
        }

        .add-formation-btn {
            font-size: 14px;
        }

        .formations-card .card-body {
            padding: 15px;
        }

        .formations-table {
            min-width: 800px;
        }
    }


    /* =========================================================
       MOBILES
       ========================================================= */

    @media (max-width: 767px) {

        .formations-page {
            padding-top: 25px !important;
            padding-bottom: 25px !important;
        }


        /* -----------------------------
           EN-TÊTE
           ----------------------------- */

        .formations-header {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .formations-title {
            width: 100%;
            gap: 10px;
        }

        .formations-title h2 {
            font-size: 23px;
        }

        .back-button {
            width: 40px;
            height: 40px;
            min-width: 40px;
        }

        .add-formation-btn {
            width: 100%;
            text-align: center;
        }


        /* -----------------------------
           ALERTES
           ----------------------------- */

        .formations-alert {
            font-size: 14px;
            padding: 12px;
        }


        /* -----------------------------
           CARD
           ----------------------------- */

        .formations-card {
            border-radius: 10px;
        }

        .formations-card .card-body {
            padding: 10px;
        }


        /* -----------------------------
           TABLEAU
           ----------------------------- */

        .formations-table-container {
            border-radius: 6px;
        }

        .formations-table {
            min-width: 750px;
            font-size: 13px;
        }

        .formations-table th,
        .formations-table td {
            padding: 10px 8px;
        }


        /* -----------------------------
           ACTIONS
           ----------------------------- */

        .formation-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 5px;
        }

        .formation-actions .btn {
            width: 100%;
            min-width: 100px;
        }


        /* -----------------------------
           MODALE
           ----------------------------- */

        .modal-dialog {
            width: calc(100% - 20px);
            max-width: none;
            margin: 10px auto;
        }

        .modal-header {
            padding: 12px 15px;
        }

        .modal-header .modal-title {
            font-size: 18px;
        }

        .modal-body {
            padding: 15px;
        }

        .modal-footer {
            padding: 12px 15px;

            flex-direction: column;
            align-items: stretch;
        }

        .modal-footer .btn {
            width: 100%;
        }

        .formation-preview-image {
            width: 90px;
        }


        /* -----------------------------
           PAGINATION
           ----------------------------- */

        .formations-pagination {
            justify-content: flex-start;
        }

        .formations-pagination .pagination {
            flex-wrap: nowrap;
            white-space: nowrap;
        }

    }


    /* =========================================================
       PETITS TÉLÉPHONES
       ========================================================= */

    @media (max-width: 480px) {

        .formations-page {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .formations-title h2 {
            font-size: 21px;
        }

        .back-button {
            width: 38px;
            height: 38px;
            min-width: 38px;
        }

        .add-formation-btn {
            font-size: 13px;
            padding: 10px;
        }

        .formations-alert {
            font-size: 13px;
        }

        .formations-table {
            min-width: 700px;
            font-size: 12px;
        }

        .formations-table th,
        .formations-table td {
            padding: 8px 6px;
        }

        .formation-status {
            font-size: 11px;
        }

        .modal-dialog {
            width: calc(100% - 10px);
            margin: 5px auto;
        }

        .modal-body {
            padding: 12px;
        }

        .modal-body .form-label {
            font-size: 13px;
        }

        .modal-body .form-control {
            font-size: 14px;
        }
    }


    /* =========================================================
       TRÈS PETITS ÉCRANS
       ========================================================= */

    @media (max-width: 360px) {

        .formations-title h2 {
            font-size: 19px;
        }

        .back-button {
            width: 35px;
            height: 35px;
            min-width: 35px;
        }

        .formations-table {
            min-width: 680px;
        }

        .formations-table th,
        .formations-table td {
            padding: 7px 5px;
        }
    }

</style>


<div class="container py-5 formations-page">


    <!-- =====================================================
         ALERTES
         ===================================================== -->

    @if(Session::has('success'))

        <div class="alert alert-success formations-alert">
            {{ Session::get('success') }}
        </div>

    @endif


    @if(Session::has('error'))

        <div class="alert alert-danger text-center formations-alert">
            {{ Session::get('error') }}
        </div>

    @endif



    <!-- =====================================================
         EN-TÊTE
         ===================================================== -->

    <div class="formations-header">


        <div class="formations-title">

            <a href="{{ route('dashboard_fo') }}"
               class="btn btn-outline-secondary back-button"
               title="Retour">

                <i class="fas fa-arrow-left"></i>

            </a>


            <h2>
                Mes Formations
            </h2>

        </div>



        <a href="{{ route('A_formation') }}"
           class="btn btn-primary add-formation-btn">

            <i class="fas fa-plus-circle me-1"></i>

            Ajouter une formation

        </a>

    </div>



    <!-- =====================================================
         TABLEAU
         ===================================================== -->

    <div class="card shadow border-0 formations-card">

        <div class="card-body">

            <div class="formations-table-container">

                <table class="table table-hover formations-table">


                    <!-- =========================
                         EN-TÊTE
                         ========================= -->

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Titre</th>

                            <th>Prix</th>

                            <th>Durée</th>

                            <th>Date</th>

                            <th>Actions</th>

                        </tr>

                    </thead>



                    <!-- =========================
                         CORPS
                         ========================= -->

                    <tbody>


                        @forelse($formations as $formation)


                        <tr>


                            <!-- ID -->

                            <td>
                                {{ $formation->id }}
                            </td>



                            <!-- TITRE -->

                            <td class="formation-title-cell">

                                <strong>
                                    {{ $formation->titre }}
                                </strong>


                                <br>


                                @if($formation->statut == 'publie')

                                    <span class="badge bg-success formation-status">

                                        ✅ Publiée

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark formation-status">

                                        📝 Brouillon

                                    </span>

                                @endif

                            </td>



                            <!-- PRIX -->

                            <td>

                                {{ number_format($formation->prix, 0, ',', ' ') }}

                                FCFA

                            </td>



                            <!-- DURÉE -->

                            <td>
                                {{ $formation->duree }}
                            </td>



                            <!-- DATE -->

                            <td>

                                {{ $formation->created_at->format('d/m/Y') }}

                            </td>



                            <!-- ACTIONS -->

                            <td>

                                <div class="formation-actions">


                                    <!-- MODULES -->

                                    <a href="{{ route('modules', $formation->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fas fa-layer-group"></i>

                                        Modules

                                    </a>



                                    <!-- MODIFIER -->

                                    <button
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $formation->id }}">

                                        <i class="fas fa-edit"></i>

                                        Modifier

                                    </button>



                                    <!-- SUPPRIMER -->

                                    <button
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $formation->id }}">

                                        <i class="fas fa-trash"></i>

                                        Supprimer

                                    </button>


                                </div>

                            </td>

                        </tr>



                        <!-- =================================================
                             MODALE MODIFICATION
                             ================================================= -->

                        <div
                            class="modal fade"
                            id="edit{{ $formation->id }}"
                            tabindex="-1"
                            aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">


                                    <form
                                        method="POST"
                                        action="{{ route('formations.update', $formation->id) }}"
                                        enctype="multipart/form-data">

                                        @csrf

                                        @method('PUT')



                                        <!-- HEADER -->

                                        <div class="modal-header">

                                            <h5 class="modal-title">

                                                Modifier formation

                                            </h5>

                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Fermer">
                                            </button>

                                        </div>



                                        <!-- BODY -->

                                        <div class="modal-body">


                                            <!-- TITRE -->

                                            <div class="mb-3">

                                                <label
                                                    for="titre{{ $formation->id }}"
                                                    class="form-label">

                                                    Titre

                                                </label>


                                                <input
                                                    type="text"
                                                    name="titre"
                                                    id="titre{{ $formation->id }}"
                                                    value="{{ $formation->titre }}"
                                                    class="form-control">

                                            </div>



                                            <!-- DESCRIPTION -->

                                            <div class="mb-3">

                                                <label
                                                    for="description{{ $formation->id }}"
                                                    class="form-label">

                                                    Description

                                                </label>


                                                <textarea
                                                    name="description"
                                                    id="description{{ $formation->id }}"
                                                    class="form-control"
                                                    rows="5">{{ $formation->description }}</textarea>

                                            </div>



                                            <!-- TITRE APERÇU -->

                                            <div class="mb-3">

                                                <label
                                                    for="titre_apercu{{ $formation->id }}"
                                                    class="form-label">

                                                    Titre de l'aperçu

                                                </label>


                                                <textarea
                                                    name="titre_apercu"
                                                    id="titre_apercu{{ $formation->id }}"
                                                    rows="5"
                                                    class="form-control">{{ old('titre_apercu', $formation->titre_apercu) }}</textarea>

                                            </div>



                                            <!-- APERÇU -->

                                            <div class="mb-3">

                                                <label
                                                    for="apercu{{ $formation->id }}"
                                                    class="form-label">

                                                    Aperçu détaillé

                                                </label>


                                                <textarea
                                                    name="apercu"
                                                    id="apercu{{ $formation->id }}"
                                                    rows="5"
                                                    class="form-control">{{ old('apercu', $formation->apercu) }}</textarea>

                                            </div>



                                            <!-- PRIX -->

                                            <div class="mb-3">

                                                <label
                                                    for="prix{{ $formation->id }}"
                                                    class="form-label">

                                                    Prix

                                                </label>


                                                <input
                                                    type="number"
                                                    name="prix"
                                                    id="prix{{ $formation->id }}"
                                                    value="{{ $formation->prix }}"
                                                    class="form-control">

                                            </div>



                                            <!-- DURÉE -->

                                            <div class="mb-3">

                                                <label
                                                    for="duree{{ $formation->id }}"
                                                    class="form-label">

                                                    Durée

                                                </label>


                                                <input
                                                    type="text"
                                                    name="duree"
                                                    id="duree{{ $formation->id }}"
                                                    value="{{ $formation->duree }}"
                                                    class="form-control">

                                            </div>



                                            <!-- IMAGE -->

                                            <div class="mb-3">

                                                <label
                                                    for="image{{ $formation->id }}"
                                                    class="form-label">

                                                    Image

                                                </label>


                                                <input
                                                    type="file"
                                                    name="image"
                                                    id="image{{ $formation->id }}"
                                                    class="form-control">


                                                @if($formation->image)

                                                    <img
                                                        src="{{ asset('storage/'.$formation->image) }}"
                                                        class="formation-preview-image rounded"
                                                        alt="Image de {{ $formation->titre }}">

                                                @endif

                                            </div>


                                        </div>



                                        <!-- FOOTER -->

                                        <div class="modal-footer">

                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">

                                                Annuler

                                            </button>


                                            <button
                                                type="submit"
                                                class="btn btn-primary">

                                                <i class="fas fa-save me-1"></i>

                                                Mettre à jour

                                            </button>

                                        </div>


                                    </form>

                                </div>

                            </div>

                        </div>



                        <!-- =================================================
                             MODALE SUPPRESSION
                             ================================================= -->

                        <div
                            class="modal fade"
                            id="delete{{ $formation->id }}"
                            tabindex="-1"
                            aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">


                                    <form
                                        method="POST"
                                        action="{{ route('formations.destroy', $formation->id) }}">

                                        @csrf

                                        @method('DELETE')



                                        <!-- HEADER -->

                                        <div class="modal-header">

                                            <h5 class="modal-title">
                                                Confirmation
                                            </h5>

                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Fermer">
                                            </button>

                                        </div>



                                        <!-- BODY -->

                                        <div class="modal-body text-center">

                                            <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>

                                            <p class="mb-0">

                                                Voulez-vous supprimer cette formation ?

                                            </p>

                                            <strong class="d-block mt-2">

                                                {{ $formation->titre }}

                                            </strong>

                                        </div>



                                        <!-- FOOTER -->

                                        <div class="modal-footer">

                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">

                                                Annuler

                                            </button>


                                            <button
                                                type="submit"
                                                class="btn btn-danger">

                                                <i class="fas fa-trash me-1"></i>

                                                Supprimer

                                            </button>

                                        </div>


                                    </form>

                                </div>

                            </div>

                        </div>



                        @empty


                        <tr>

                            <td
                                colspan="6"
                                class="text-center text-muted py-5">

                                <i class="fas fa-book-open fa-2x mb-3 d-block"></i>

                                Aucune formation trouvée

                            </td>

                        </tr>


                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>

    </div>



    <!-- =====================================================
         PAGINATION
         ===================================================== -->

    <div class="formations-pagination">

        {{ $formations->links() }}

    </div>


</div>

@endsection