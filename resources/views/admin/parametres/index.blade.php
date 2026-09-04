@extends('admin.layout')

@section('title', 'Paramètres - SkillOra')




@section('content')

@if(session('success'))
    <div class="container-fluid px-4 pt-3">

        <div
            class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3"
            role="alert"
        >

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Fermer"
            ></button>

        </div>

    </div>
@endif


@if(session('error'))
    <div class="container-fluid px-4 pt-3">

        <div
            class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3"
            role="alert"
        >

            <i class="fas fa-exclamation-circle me-2"></i>

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Fermer"
            ></button>

        </div>

    </div>
@endif


@if($errors->any())
    <div class="container-fluid px-4 pt-3">

        <div
            class="alert alert-danger shadow-sm border-0 rounded-3"
            role="alert"
        >

            <div class="fw-bold mb-2">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Veuillez corriger les erreurs suivantes :
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    </div>
@endif

<div class="container-fluid">

    {{-- EN-TÊTE --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            Paramètres
        </h2>

        <p class="text-muted mb-0">
            Gérez votre compte administrateur et les préférences de la plateforme.
        </p>
    </div>


    <div class="row g-4">

        {{-- INFORMATIONS DU COMPTE --}}
        <div class="col-12 col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                            <i class="fas fa-user text-primary"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-1">
                                Informations du compte
                            </h5>

                            <p class="text-muted mb-0">
                                Modifiez vos informations personnelles.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <form action="{{ route('admin.parametres.profil') }}" method="POST">

                        @csrf

                        @method('PUT')


                        {{-- NOM --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nom
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', auth()->user()->name) }}"
                                required
                            >

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Adresse e-mail
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', auth()->user()->email) }}"
                                required
                            >

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        <div class="text-end">

                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >

                                <i class="fas fa-save me-2"></i>

                                Enregistrer

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- COMPTE --}}
        <div class="col-12 col-lg-5">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="fw-bold mb-1">
                        Mon compte
                    </h5>

                    <p class="text-muted mb-0">
                        Informations de votre compte administrateur.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <div
                            class="rounded-circle bg-primary bg-opacity-10
                                   d-inline-flex align-items-center
                                   justify-content-center"
                            style="width:90px;height:90px;"
                        >

                            <i class="fas fa-user-shield text-primary fa-2x"></i>

                        </div>

                        <h5 class="fw-bold mt-3 mb-1">
                            {{ auth()->user()->name }}
                        </h5>

                        <span class="badge bg-primary">
                            Administrateur
                        </span>

                    </div>


                    <div class="border-top pt-3">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                E-mail
                            </span>

                            <span class="fw-semibold text-break">
                                {{ auth()->user()->email }}
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Compte créé
                            </span>

                            <span class="fw-semibold">
                                {{ auth()->user()->created_at->format('d/m/Y') }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- MOT DE PASSE --}}
        <div class="col-12 col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">

                            <i class="fas fa-lock text-warning"></i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Sécurité
                            </h5>

                            <p class="text-muted mb-0">
                                Modifiez votre mot de passe.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.parametres.password') }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Mot de passe actuel
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nouveau mot de passe
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Confirmer le nouveau mot de passe
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="text-end">

                            <button
                                type="submit"
                                class="btn btn-warning px-4"
                            >

                                <i class="fas fa-key me-2"></i>

                                Modifier le mot de passe

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- NOTIFICATIONS --}}
        <div class="col-12 col-lg-5">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">

                            <i class="fas fa-bell text-success"></i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Notifications
                            </h5>

                            <p class="text-muted mb-0">
                                Gérez vos préférences de notification.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.parametres.notifications') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="form-check form-switch mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="notifications"
                                value="1"
                                id="notifications"
                                {{ auth()->user()->notifications_active ? 'checked' : '' }}
                            >

                            <label
                                class="form-check-label fw-semibold"
                                for="notifications"
                            >
                                Recevoir les notifications
                            </label>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-success w-100"
                        >

                            <i class="fas fa-save me-2"></i>

                            Enregistrer les préférences

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection