@extends('Accueil.layouts.appp2')


@section('content')


<div class="container py-5">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3 mb-4">

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-3 mb-4">

            <i class="fas fa-exclamation-circle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger shadow-sm rounded-3 mb-4">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <h2 class="fw-bold mb-4">

        👤 Mon profil

    </h2>


    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <div class="row align-items-center">


                <div class="col-md-3 text-center">


                    @if($user->photo)

                        <img src="{{ asset('storage/'.$user->photo) }}"
                        class="rounded-circle mb-3"
                        width="150"
                        height="150"
                        style="object-fit:cover;">

                    @else

                        <img src="{{ $user->photo 
                            ? asset('storage/'.$user->photo) 
                            : asset('assets/img/user.png') }}"
                        class="rounded-circle mb-3"
                        width="150"
                        height="150"
                        style="object-fit:cover;">

                    @endif

                    @if($user->photo)

                        <form method="POST" 
                            action="{{ route('supprimer_photo') }}">

                            @csrf

                            <button class="btn btn-outline-danger btn-sm">

                                <i class="fas fa-trash"></i>
                                Supprimer la photo

                            </button>

                        </form>

                    @endif


                </div>



                <div class="col-md-9">


                    <h3 class="fw-bold">

                        {{ $user->name }}

                    </h3>


                    <p>
                        <i class="fas fa-envelope"></i>
                        {{ $user->email }}
                    </p>


                    <p>
                        <strong>Rôle :</strong>
                        {{ ucfirst($user->role) }}
                    </p>


                    <hr>

                    
                    


                    <div class="row">


                        <div class="col-md-6">

                            <p>
                                <strong>Date de naissance :</strong>

                                {{ $user->date_naissance ?? 'Non renseignée' }}

                            </p>


                            <p>
                                <strong>Sexe :</strong>

                                {{ $user->sexe ?? 'Non renseigné' }}

                            </p>


                            <p>
                                <strong>Ville :</strong>

                                {{ $user->ville ?? 'Non renseignée' }}

                            </p>


                        </div>



                        <div class="col-md-6">


                            <p>

                                <strong>Pays :</strong>

                                {{ $user->pays ?? 'Non renseigné' }}

                            </p>


                            <p>

                                <strong>Adresse :</strong>

                                {{ $user->adresse ?? 'Non renseignée' }}

                            </p>


                        </div>


                    </div>


                    <hr>


                    <h6 class="fw-bold">
                        Biographie
                    </h6>


                    <p class="text-muted">

                        {{ $user->bio ?? 'Aucune biographie renseignée.' }}

                    </p>


                </div>
               


            </div>
            <div class="mt-4">

                        <button class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modifierProfil">

                            <i class="fas fa-user-edit me-2"></i>

                            Modifier mon profil

                        </button>

                        <button class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#changerMotDePasse">

                        <i class="fas fa-lock me-2"></i>

                        Changer le mot de passe

                    </button>

            </div>


        </div>
        
    </div>

        <!-- ================= MODAL MODIFICATION PROFIL ================= -->

    <div class="modal fade" id="modifierProfil" tabindex="-1">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content rounded-4 border-0 shadow">


                <div class="modal-header">

                    <h5 class="modal-title fw-bold">

                        ✏️ Modifier mon profil

                    </h5>


                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">

                    </button>

                </div>



                <div class="modal-body">


                <form action="{{ route('profil_update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                @csrf


                        <div class="row">


                            <!-- Nom -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Nom complet

                                </label>


                                <input type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name',$user->name) }}">


                            </div>



                            <!-- Email -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Adresse email

                                </label>


                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email',$user->email) }}">


                            </div>




                            <!-- Photo -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Photo de profil

                                </label>


                                <input type="file"
                                    name="photo"
                                    class="form-control">


                            </div>




                            <!-- Date naissance -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Date de naissance

                                </label>


                                <input type="date"
                                    name="date_naissance"
                                    class="form-control"
                                    value="{{ old('date_naissance',$user->date_naissance) }}">


                            </div>





                            <!-- Sexe -->

                            <div class="col-md-6 mb-3">


                                <label class="form-label fw-semibold">

                                    Sexe

                                </label>


                                <select name="sexe" class="form-select">


                                    <option value="">Choisir</option>

                                    <option value="Homme"
                                    {{ old('sexe',$user->sexe)=="Homme" ? 'selected' : '' }}>
                                        Homme
                                    </option>

                                    <option value="Femme"
                                    {{ old('sexe',$user->sexe)=="Femme" ? 'selected' : '' }}>
                                        Femme
                                    </option>


                                </select>


                            </div>





                            <!-- Ville -->

                            <div class="col-md-6 mb-3">


                                <label class="form-label fw-semibold">

                                    Ville

                                </label>


                                <input type="text"
                                    name="ville"
                                    class="form-control"
                                    value="{{ old('ville',$user->ville) }}">


                            </div>





                            <!-- Pays -->

                            <div class="col-md-6 mb-3">


                                <label class="form-label fw-semibold">

                                    Pays

                                </label>


                                <input type="text"
                                    name="pays"
                                    class="form-control"
                                    value="{{ old('pays',$user->pays) }}">


                            </div>





                            <!-- Adresse -->

                            <div class="col-md-6 mb-3">


                                <label class="form-label fw-semibold">

                                    Adresse

                                </label>


                                <input type="text"
                                    name="adresse"
                                    class="form-control"
                                    value="{{ old('adresse',$user->adresse) }}">


                            </div>





                            <!-- Bio -->

                            <div class="col-12 mb-3">


                                <label class="form-label fw-semibold">

                                    Biographie

                                </label>


                                <textarea name="bio" class="form-control"
                                        rows="4">{{ old('bio',$user->bio) }}</textarea>


                            </div>


                        </div>

                        
                        <div class="modal-footer">


                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">

                                Annuler

                            </button>



                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save me-2"></i>

                                Enregistrer

                            </button>


                        </div>



                    </form>


                </div>




            </div>

        </div>

    </div>

        <!-- ================= MODAL CHANGEMENT MOT DE PASSE ================= -->

    <div class="modal fade" id="changerMotDePasse" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content rounded-4 border-0 shadow">


                <div class="modal-header">

                    <h5 class="modal-title fw-bold">

                        🔒 Changer mon mot de passe

                    </h5>


                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">

                    </button>

                </div>



                <form method="POST"
                    action="{{ route('changer_password') }}">

                    @csrf


                    <div class="modal-body">


                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Ancien mot de passe

                            </label>

                            <input type="password"
                                name="ancien_password"
                                class="form-control"
                                required>

                        </div>



                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Nouveau mot de passe

                            </label>

                            <input type="password"
                                name="nouveau_password"
                                class="form-control"
                                required>

                        </div>



                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Confirmer le nouveau mot de passe

                            </label>

                            <input type="password"
                                name="confirmation_password"
                                class="form-control"
                                required>

                        </div>


                    </div>



                    <div class="modal-footer">


                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">

                            Annuler

                        </button>


                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save me-2"></i>

                            Modifier

                        </button>


                    </div>


                </form>


            </div>

        </div>

    </div>


</div>




    @if(session('success'))

    <script>
        setTimeout(function () {
            let alert = document.querySelector('.alert-success');

            if (alert) {
                let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 10000);
    </script>

    @endif


@endsection