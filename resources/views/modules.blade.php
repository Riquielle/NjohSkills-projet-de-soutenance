@extends('Accueil.layouts.appf')

@section('content')

<style>
    /* ================================
       PAGE MODULES
    ================================= */

    .modules-page {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    /* ================================
       EN-TÊTE
    ================================= */

    .modules-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .modules-title-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 0;
    }

    .back-button {
        width: 45px;
        height: 45px;
        min-width: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .back-button:hover {
        transform: translateX(-3px);
    }

    .modules-title {
        font-size: 28px;
        font-weight: 700;
        margin: 0;
        line-height: 1.2;
        word-break: break-word;
    }

    .formation-name {
        margin: 4px 0 0;
        color: #6c757d;
        font-size: 15px;
        word-break: break-word;
    }

    .add-module-btn {
        white-space: nowrap;
        flex-shrink: 0;
    }

    /* ================================
       ALERTES
    ================================= */

    .modules-alert {
        margin-bottom: 20px;
        width: 100%;
    }

    /* ================================
       CARTE PRINCIPALE
    ================================= */

    .modules-card {
        border-radius: 12px;
        overflow: hidden;
    }

    .modules-card-body {
        padding: 25px;
    }

    /* ================================
       CARTE MODULE
    ================================= */

    .module-item {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        transition: all 0.2s ease;
        background: #fff;
    }

    .module-item:last-child {
        margin-bottom: 0;
    }

    .module-item:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
    }

    .module-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
    }

    .module-info {
        flex: 1;
        min-width: 0;
    }

    .module-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #212529;
        word-break: break-word;
    }

    .module-objectif {
        margin-bottom: 0;
        color: #6c757d;
        line-height: 1.6;
        word-break: break-word;
    }

    /* ================================
       ACTIONS
    ================================= */

    .module-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 7px;
        flex-wrap: wrap;
        flex-shrink: 0;
    }

    .module-actions .btn {
        white-space: nowrap;
    }

    /* ================================
       MODALES
    ================================= */

    .module-modal .modal-content {
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    .module-modal .modal-header {
        padding: 18px 20px;
    }

    .module-modal .modal-body {
        padding: 20px;
    }

    .module-modal .modal-footer {
        padding: 15px 20px;
        gap: 8px;
    }

    .module-modal label {
        font-weight: 600;
        margin-bottom: 7px;
    }

    .module-modal .form-control {
        border-radius: 7px;
    }

    /* ================================
       TABLETTE
    ================================= */

    @media (max-width: 991px) {

        .modules-page {
            padding: 25px 15px;
        }

        .modules-header {
            align-items: flex-start;
        }

        .modules-title {
            font-size: 24px;
        }

        .module-content {
            flex-direction: column;
            gap: 15px;
        }

        .module-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .module-actions .btn {
            flex: 0 0 auto;
        }
    }

    /* ================================
       MOBILE
    ================================= */

    @media (max-width: 767px) {

        .modules-page {
            padding: 20px 12px;
        }

        .modules-header {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 15px;
        }

        .modules-title-wrapper {
            width: 100%;
        }

        .modules-title {
            font-size: 21px;
        }

        .formation-name {
            font-size: 14px;
        }

        .add-module-btn {
            width: 100%;
            padding: 10px 15px;
        }

        .modules-card-body {
            padding: 15px;
        }

        .module-item {
            padding: 15px;
        }

        .module-title {
            font-size: 18px;
        }

        .module-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            gap: 8px;
        }

        .module-actions .btn {
            width: 100%;
            margin: 0 !important;
        }

        .module-modal .modal-dialog {
            width: calc(100% - 20px);
            max-width: none;
            margin: 10px auto;
        }

        .module-modal .modal-body {
            padding: 15px;
        }

        .module-modal .modal-footer {
            display: flex;
            flex-direction: column-reverse;
            padding: 15px;
        }

        .module-modal .modal-footer .btn {
            width: 100%;
        }
    }

    /* ================================
       PETITS TÉLÉPHONES
    ================================= */

    @media (max-width: 480px) {

        .modules-page {
            padding: 15px 10px;
        }

        .modules-title-wrapper {
            gap: 10px;
        }

        .back-button {
            width: 40px;
            height: 40px;
            min-width: 40px;
        }

        .modules-title {
            font-size: 19px;
        }

        .formation-name {
            font-size: 13px;
        }

        .modules-card-body {
            padding: 10px;
        }

        .module-item {
            padding: 13px;
        }

        .module-title {
            font-size: 17px;
        }

        .module-objectif {
            font-size: 14px;
        }

        .module-actions {
            grid-template-columns: 1fr;
        }

        .module-modal .modal-dialog {
            width: calc(100% - 10px);
            margin: 5px auto;
        }

        .module-modal .modal-header {
            padding: 15px;
        }

        .module-modal .modal-header h5 {
            font-size: 17px;
        }
    }

    /* ================================
       TRÈS PETITS ÉCRANS
    ================================= */

    @media (max-width: 360px) {

        .modules-title {
            font-size: 17px;
        }

        .formation-name {
            font-size: 12px;
        }

        .back-button {
            width: 36px;
            height: 36px;
            min-width: 36px;
        }

        .module-item {
            padding: 10px;
        }

        .module-title {
            font-size: 16px;
        }

        .module-objectif {
            font-size: 13px;
        }
    }
</style>


<div class="modules-page">

    {{-- ================================
         ALERTES
    ================================= --}}

    @if(Session::has('success'))
        <div class="alert alert-success modules-alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger text-center modules-alert">
            {{ Session::get('error') }}
        </div>
    @endif


    {{-- ================================
         EN-TÊTE
    ================================= --}}

    <div class="modules-header">

        <div class="modules-title-wrapper">

            {{-- Bouton retour --}}
            <a href="{{ route('Mes_formations') }}"
               class="btn btn-light border back-button"
               title="Retour aux formations">

                <i class="fas fa-arrow-left"></i>

            </a>


            <div>

                <h2 class="modules-title">
                    Modules de la formation
                </h2>

                <p class="formation-name">
                    {{ $formation->titre }}
                </p>

            </div>

        </div>


        {{-- Ajouter un module --}}
        <button class="btn btn-primary add-module-btn"
                data-bs-toggle="modal"
                data-bs-target="#addModule">

            <i class="fas fa-plus me-1"></i>
            Ajouter un module

        </button>

    </div>


    {{-- ================================
         LISTE DES MODULES
    ================================= --}}

    <div class="card shadow border-0 modules-card">

        <div class="card-body modules-card-body">

            @forelse($modules as $module)

                <div class="module-item">

                    <div class="module-content">

                        {{-- Informations du module --}}
                        <div class="module-info">

                            <h4 class="module-title">

                                {{ $module->ordre }}.
                                {{ $module->titre }}

                            </h4>

                            <p class="module-objectif">

                                {{ $module->objectif }}

                            </p>

                        </div>


                        {{-- ================================
                             ACTIONS
                        ================================= --}}

                        <div class="module-actions">

                            {{-- Leçons --}}
                            <a href="{{ route('lecons', $module->id) }}"
                               class="btn btn-success btn-sm">

                                <i class="fas fa-book-open me-1"></i>
                                Leçons

                            </a>


                            {{-- Quiz --}}
                            <a href="{{ route('quiz', $module->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-question-circle me-1"></i>
                                Quiz

                            </a>


                            {{-- Modifier --}}
                            <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModule{{ $module->id }}">

                                <i class="fas fa-edit me-1"></i>
                                Modifier

                            </button>


                            {{-- Supprimer --}}
                            <button class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModule{{ $module->id }}">

                                <i class="fas fa-trash me-1"></i>
                                Supprimer

                            </button>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     MODALE MODIFICATION
                =================================================== --}}

                <div class="modal fade module-modal"
                     id="editModule{{ $module->id }}"
                     tabindex="-1"
                     aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">

                            <form method="POST"
                                  action="{{ route('modules.update',$module->id) }}">

                                @csrf
                                @method('PUT')


                                {{-- Header --}}
                                <div class="modal-header">

                                    <h5 class="modal-title">
                                        <i class="fas fa-edit me-2"></i>
                                        Modifier le module
                                    </h5>

                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Fermer">
                                    </button>

                                </div>


                                {{-- Body --}}
                                <div class="modal-body">

                                    <div class="mb-3">

                                        <label>
                                            Titre
                                        </label>

                                        <input type="text"
                                               name="titre"
                                               value="{{ $module->titre }}"
                                               class="form-control"
                                               required>

                                    </div>


                                    <div class="mb-3">

                                        <label>
                                            Objectif
                                        </label>

                                        <textarea name="objectif"
                                                  rows="4"
                                                  class="form-control"
                                                  required>{{ $module->objectif }}</textarea>

                                    </div>


                                    <div class="mb-3">

                                        <label>
                                            Ordre
                                        </label>

                                        <input type="number"
                                               name="ordre"
                                               value="{{ $module->ordre }}"
                                               class="form-control"
                                               min="1"
                                               required>

                                    </div>

                                </div>


                                {{-- Footer --}}
                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">

                                        Annuler

                                    </button>

                                    <button type="submit"
                                            class="btn btn-warning">

                                        <i class="fas fa-save me-1"></i>
                                        Mettre à jour

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     MODALE SUPPRESSION
                =================================================== --}}

                <div class="modal fade module-modal"
                     id="deleteModule{{ $module->id }}"
                     tabindex="-1"
                     aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">

                            <form method="POST"
                                  action="{{ route('modules.destroy',$module->id) }}">

                                @csrf
                                @method('DELETE')


                                {{-- Header --}}
                                <div class="modal-header">

                                    <h5 class="modal-title">

                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        Confirmation

                                    </h5>

                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Fermer">
                                    </button>

                                </div>


                                {{-- Body --}}
                                <div class="modal-body">

                                    <p class="mb-0">

                                        Voulez-vous vraiment supprimer le module
                                        <strong>
                                            "{{ $module->titre }}"
                                        </strong>
                                        ?

                                    </p>

                                </div>


                                {{-- Footer --}}
                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">

                                        Annuler

                                    </button>

                                    <button type="submit"
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

                <div class="alert alert-info text-center mb-0">

                    <i class="fas fa-info-circle me-2"></i>

                    Aucun module disponible.

                </div>

            @endforelse

        </div>

    </div>

</div>


{{-- ==================================================
     MODALE AJOUT MODULE
=================================================== --}}

<div class="modal fade module-modal"
     id="addModule"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form method="POST"
                  action="{{ route('modules.store',$formation->id) }}">

                @csrf


                {{-- Header --}}
                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="fas fa-plus-circle me-2"></i>
                        Ajouter un module

                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Fermer">
                    </button>

                </div>


                {{-- Body --}}
                <div class="modal-body">

                    {{-- Titre --}}
                    <div class="mb-3">

                        <label for="titre">
                            Titre
                        </label>

                        <input type="text"
                               id="titre"
                               name="titre"
                               class="form-control"
                               placeholder="Ex : Introduction à la formation"
                               required>

                    </div>


                    {{-- Objectif --}}
                    <div class="mb-3">

                        <label for="objectif">
                            Objectif
                        </label>

                        <textarea id="objectif"
                                  name="objectif"
                                  rows="4"
                                  class="form-control"
                                  placeholder="Décrivez l'objectif de ce module..."
                                  required></textarea>

                    </div>


                    {{-- Ordre --}}
                    <div class="mb-3">

                        <label for="ordre">
                            Ordre
                        </label>

                        <input type="number"
                               id="ordre"
                               name="ordre"
                               value="{{ $modules->count()+1 }}"
                               class="form-control"
                               min="1"
                               required>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Annuler

                    </button>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save me-1"></i>
                        Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection