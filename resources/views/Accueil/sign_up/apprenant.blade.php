@extends('Accueil.layouts.app')
@section('content')

<!-- START TOP HEADER CLASS -->
	<div class="top_header_banner">
<!-- START SECTION TOP -->
		<section class="section-top" style="background-image: url('{{ asset('assets/img/bg/home-bg.jpg') }}'); background-size:cover; background-position: center center;" >
			<div class="container">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h1>S'inscrire</h1>
						<ul>
							<li><a href="{{route('home')}}">Accueil</a></li>
							<li> / S'inscrire comme apprenant</li>
						</ul>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</section>	
		<!-- END SECTION TOP -->
	</div><!-- END  TOP HEADER CLASS -->


	<!-- START LOGIN AND REGISTER -->
	<section class="login_register section-padding">
		<div class="container">
			<div class="row">				
				<div class="register-box">
					<div class="register">

						@if (Session::has('error'))
							<div class="alert alert-danger text-center">
								{{ Session::get('error') }}
							</div>
						@endif
						<h4 class="login_register_title">Créer un nouveau compte:</h4>

						<form method="post" action="{{ route('processsign_upApprenant') }}">
        					@csrf

							<div class="form-group">
								<label for="name">Nom</label>
								<input type="text" value="{{ old('name') }}" id="name" class=" form-control @error('name') is-invalid @enderror" name="name" placeholder="Nom">
								@error('name')
									<p class="invalid-feedback">{{$message}}</p>
								@enderror
							</div>
							
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" value="{{old('email')}}" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" >
								@error('email')
									<p class="invalid-feedback">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group position-relative">
								<label for="password">Mot de passe</label>

								<input type="password"
									id="password"
									class="form-control @error('password') is-invalid @enderror"
									name="password"
									placeholder="Mot de passe"
									style="padding-right: 45px;">

								<span onclick="togglePassword('password', 'eyePassword')"
									style="position: absolute;
											right: 15px;
											top: 38px;
											cursor: pointer;
											z-index: 10;">
									<i class="fa fa-eye" id="eyePassword"></i>
								</span>

								@error('password')
									<p class="invalid-feedback">{{ $message }}</p>
								@enderror

								 <div id="passwordHelp" class="mt-2 small">
									<div id="lengthRule" class="text-danger">
										✗ Au moins 8 caractères
									</div>

									<div id="uppercaseRule" class="text-danger">
										✗ Une lettre majuscule
									</div>

									<div id="lowercaseRule" class="text-danger">
										✗ Une lettre minuscule
									</div>

									<div id="numberRule" class="text-danger">
										✗ Un chiffre
									</div>

									<div id="symbolRule" class="text-danger">
										✗ Un caractère spécial
									</div>
								</div>
							</div>

							<div class="form-group position-relative">
								<label for="password_confirmation">Confirmer le mot de passe</label>

								<input type="password"
									id="password_confirmation"
									class="form-control requiredField input-label"
									name="password_confirmation"
									placeholder="Confirmer le mot de passe"
									style="padding-right: 45px;">

								<span onclick="togglePassword('password_confirmation', 'eyeConfirmation')"
									style="position: absolute;
											right: 15px;
											top: 38px;
											cursor: pointer;
											z-index: 10;">
									<i class="fa fa-eye" id="eyeConfirmation"></i>
								</span>
							</div>

							<script>
							function togglePassword(inputId, iconId) {
								const password = document.getElementById(inputId);
								const eyeIcon = document.getElementById(iconId);

								if (password.type === "password") {
									password.type = "text";
									eyeIcon.classList.remove("fa-eye");
									eyeIcon.classList.add("fa-eye-slash");
								} else {
									password.type = "password";
									eyeIcon.classList.remove("fa-eye-slash");
									eyeIcon.classList.add("fa-eye");
								}
							}
							</script>
							<div class="form-group col-lg-12">
								<button class="btn_one" type="submit" name="submit">S'enregistrer</button>
							</div>
						</form>

						<p>vous avez déja un compte? <a href="{{ route('sign_in') }}">Se connecter</a></p>
					</div>
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END LOGIN AND REGISTER -->


	<script>
		document.getElementById('password').addEventListener('input', function () {

			const password = this.value;

			const rules = {
				length: password.length >= 8,
				uppercase: /[A-Z]/.test(password),
				lowercase: /[a-z]/.test(password),
				number: /[0-9]/.test(password),
				symbol: /[^A-Za-z0-9]/.test(password)
			};

			updateRule('lengthRule', rules.length, 'Au moins 8 caractères');
			updateRule('uppercaseRule', rules.uppercase, 'Une lettre majuscule');
			updateRule('lowercaseRule', rules.lowercase, 'Une lettre minuscule');
			updateRule('numberRule', rules.number, 'Un chiffre');
			updateRule('symbolRule', rules.symbol, 'Un caractère spécial');
		});

		function updateRule(id, valid, text) {

			const element = document.getElementById(id);

			if (valid) {
				element.textContent = '✓ ' + text;
				element.classList.remove('text-danger');
				element.classList.add('text-success');
			} else {
				element.textContent = '✗ ' + text;
				element.classList.remove('text-success');
				element.classList.add('text-danger');
			}
		}
	</script>
		
@stop