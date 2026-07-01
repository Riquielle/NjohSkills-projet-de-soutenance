@extends('Accueil.layouts.app')
@section('content')

<!-- START TOP HEADER CLASS -->
	<div class="top_header_banner">
<!-- START SECTION TOP -->
		<section class="section-top">
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
							<div class="form-group">
								<label for="password">mot de passe</label>
								<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe">
								@error('password')
									<p class="invalid-feedback">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label for="password">Confirmer le mot de passe</label>
								<input type="password" id="password_confirmation" class="form-control requiredField input-label" name="password_confirmation" placeholder="Confirmer le mot de passe" >
							</div>
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
		
@stop