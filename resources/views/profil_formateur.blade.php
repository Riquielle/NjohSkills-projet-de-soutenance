@extends('Accueil.layouts.appf')

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

        👨‍🏫 Mon profil formateur

    </h2>



    <div class="card shadow border-0 rounded-4">


        <div class="card-body p-4">


            <div class="row align-items-center">


                <!-- PHOTO -->

                <div class="col-md-3 text-center">

                    @if($user->photo)

                        <img src="{{ asset('storage/'.$user->photo) }}"
                            class="rounded-circle mb-3"
                            width="150"
                            height="150"
                            style="object-fit:cover;">

                        @else

                        <img src="{{ asset('assets/img/user.png') }}"
                            class="rounded-circle mb-3"
                            width="150"
                            height="150"
                            style="object-fit:cover;">

                    @endif

                    @if($user->photo)

                        <form method="POST"
                            action="{{ route('supprimer_photo_formateur') }}">

                            @csrf

                            <button class="btn btn-outline-danger btn-sm">

                                <i class="fas fa-trash me-2"></i>

                                Supprimer la photo

                            </button>

                        </form>

                    @endif


                </div>

                



                <!-- INFORMATIONS -->

                <div class="col-md-9">


                    <h3 class="fw-bold">

                        {{ $user->name }}

                    </h3>



                    <p class="text-muted">

                        <i class="fas fa-envelope me-2"></i>

                        {{ $user->email }}

                    </p>




                    <hr>




                    <div class="row">


                        <div class="col-md-6 mb-3">


                            <strong>
                                📞 Téléphone
                            </strong>

                            <p class="text-muted mb-0">

                                {{ $formateur->telephone ?? 'Non renseigné' }}

                            </p>


                        </div>




                        <div class="col-md-6 mb-3">


                            <strong>
                                🎓 Spécialité
                            </strong>

                            <p class="text-muted mb-0">

                                {{ $formateur->specialite ?? 'Non renseignée' }}

                            </p>


                        </div>





                        <div class="col-md-6 mb-3">


                            <strong>
                                ⏳ Expérience
                            </strong>

                            <p class="text-muted mb-0">

                                {{ $formateur->experience ?? 0 }} ans

                            </p>


                        </div>





                        <div class="col-md-6 mb-3">


                            <strong>
                                👤 Sexe
                            </strong>

                            <p class="text-muted mb-0">

                                {{ $user->sexe ?? 'Non renseigné' }}

                            </p>


                        </div>



                    </div>





                    <hr>




                    <h5 class="fw-bold">

                        📝 Biographie

                    </h5>


                    <p class="text-muted">

                        {{ $formateur->biographie ?? 'Aucune biographie disponible.' }}

                    </p>



                </div>



            </div>



            <hr>



            <!-- BOUTONS -->

            <div class="text-end">

                <button class="btn btn-primary rounded-3 me-2"
                        data-bs-toggle="modal"
                        data-bs-target="#modifierProfilFormateur">

                    <i class="fas fa-edit me-2"></i>

                    Modifier mon profil

                </button>



                <button class="btn btn-outline-secondary rounded-3"
                        data-bs-toggle="modal"
                        data-bs-target="#changerMotPasseFormateur">

                    <i class="fas fa-lock me-2"></i>

                    Changer mot de passe

                </button>



            </div>



        </div>


    </div>



</div>


<!-- ================= MODAL MODIFICATION PROFIL FORMATEUR ================= -->

<div class="modal fade" id="modifierProfilFormateur" tabindex="-1">


    <div class="modal-dialog modal-lg modal-dialog-centered">


        <div class="modal-content rounded-4 border-0 shadow">



            <div class="modal-header">

                <h5 class="modal-title fw-bold">

                ✏️ Modifier mon profil formateur

                </h5>


                <button type="button"
                class="btn-close"
                data-bs-dismiss="modal">

                </button>

            </div>




            <form method="POST"
                action="{{ route('profil_formateur_update') }}"
                enctype="multipart/form-data">


                @csrf


                <div class="modal-body">


                    <div class="row">



                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Nom complet
                            </label>


                            <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ $user->name }}">

                        </div>




                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Email
                            </label>


                            <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ $user->email }}">

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Photo
                            </label>


                            <input type="file"
                            name="photo"
                            class="form-control">

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Téléphone
                            </label>


                            <input type="text"
                            name="telephone"
                            class="form-control"
                            value="{{ $formateur->telephone }}">

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Spécialité
                            </label>


                            <input type="text"
                                class="form-control"
                                value="{{ $formateur->specialite }}"
                                disabled>

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Expérience (années)
                            </label>


                            <input type="number"
                            name="experience"
                            class="form-control"
                            value="{{ $formateur->experience }}">

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Ville
                            </label>


                            <input type="text"
                            name="ville"
                            class="form-control"
                            value="{{ $user->ville }}">

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                            Pays
                            </label>


                            <input type="text"
                            name="pays"
                            class="form-control"
                            value="{{ $user->pays }}">

                        </div>





                        <div class="col-12 mb-3">

                            <label class="form-label">
                            Biographie
                            </label>


                            <textarea name="biographie"
                            class="form-control"
                            rows="4">{{ $formateur->biographie }}</textarea>


                        </div>




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


<!-- ================= MODAL CHANGEMENT MOT DE PASSE FORMATEUR ================= -->

<div class="modal fade" id="changerMotPasseFormateur" tabindex="-1">

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



            <form method="POST" action="{{ route('modifier_password_formateur') }}">

                @csrf


                <div class="modal-body">


                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Ancien mot de passe
                        </label>


                        <input type="password"
                               name="ancien_password"
                               class="form-control"
                               placeholder="Entrer votre ancien mot de passe"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nouveau mot de passe
                        </label>

                        <input type="password"
                            name="nouveau_password"
                            class="form-control"
                            placeholder="Entrer le nouveau mot de passe"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Confirmer le nouveau mot de passe
                        </label>

                        <input type="password"
                            name="nouveau_password_confirmation"
                            class="form-control"
                            placeholder="Confirmer le nouveau mot de passe"
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