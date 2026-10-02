@extends('Accueil.layouts.app')

@section('content')

<!-- START TOP HEADER CLASS -->
<div class="top_header_banner">

    <section class="section-top" style="background-image: url('{{ asset('assets/img/bg/home-bg.jpg') }}'); background-size:cover; background-position: center center;">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight">
                    <h1>Connexion</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li> / Se Connecter</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- START LOGIN -->
<section class="login_register section-padding">
    <div class="container">
        <div class="row">

            <div class="login-box">
                <div class="login">
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
                    <h4 class="login_register_title">Déja membre? se Connecter:</h4>

                    <!--  FORM AJOUTÉ ICI -->
                    <form method="post" action="{{route('authenticate')}}">
                        @csrf

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
							@error('email')
								<p class="invalid-feedback">{{ $message }}</p>
							@enderror
                        </div>

                        <div class="form-group position-relative">
                            <label>Mot de passe</label>

                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                id="password"
                                placeholder="Mot de passe"
                                style="padding-right: 45px;">

                            <span onclick="togglePassword()"
                                style="position: absolute;
                                        right: 15px;
                                        top: 38px;
                                        cursor: pointer;
                                        z-index: 10;">
                                <i class="fa fa-eye" id="eyeIcon"></i>
                            </span>

                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                        function togglePassword() {
                            const password = document.getElementById('password');
                            const eyeIcon = document.getElementById('eyeIcon');

                            if (password.type === 'password') {
                                password.type = 'text';
                                eyeIcon.classList.remove('fa-eye');
                                eyeIcon.classList.add('fa-eye-slash');
                            } else {
                                password.type = 'password';
                                eyeIcon.classList.remove('fa-eye-slash');
                                eyeIcon.classList.add('fa-eye');
                            }
                        }
                        </script>

                        <div class="form-group col-lg-12">
                            <button class="btn_one" type="submit">
                                Login
                            </button>
                        </div>

                    </form>

                    <p>
                        Vous n'avez pas de compte ?
                        <a href="{{ route('sign_up.apprenant') }}">
                            S'enregistrer maintenant
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>

@stop