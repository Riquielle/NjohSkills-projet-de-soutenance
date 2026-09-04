<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Eduleb - Education HTML Template">
		<meta name="keywords" content="agency, business, corporate, creative, html5, modern, multipurpose, One Page, parallax, startup">		
		<!-- SITE TITLE -->
		<title>SkillOra</title>			
		<!-- Latest Bootstrap min CSS -->
				
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
		<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.theme.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/jquery-simple-mobilemenu.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">				
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
    <body data-spy="scroll" data-offset="80">

		<!-- START PRELOADER -->
		<div class="preloaders">
			<span class="loader"></span>
		</div>
		<!-- END PRELOADER -->		

		<!-- START NAVBAR -->  
		<div id="navigation" class="navbar-light bg-faded site-navigation">
			<div class="container-fluid">
				<div class="row">
					<div class="col-20 align-self-center">
						<a class="navbar-brand fw-bold fs-1" href="/">
							<span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>
						</a>
					</div><!--- END Col -->
					
					<div class="col-60 d-flex">
						<nav id="main-menu">
							<ul>
								<li class="menu-item-has-children"><a href="#">Accueil</a>
									<ul>                                        
										<li><a href="{{ route('home') }}">Accueil 01</a></li>
										<li><a href="{{ route('home2') }}">Accueil 02</a></li>
									</ul>
								</li>
								<li><a href="{{ route('about') }}">A propos</a></li>                                  
								<li class="menu-item-has-children"><a href="#">Formations</a>
									<ul>                                        
										<li><a href="{{ route('formations') }}">Formations</a></li>
									</ul>
								</li>                               
								                         
								<li class="menu-item-has-children"><a href="blog.html">Blog</a>
									<ul>                                        
										<li><a href="blog.html">Blog</a></li>
										<li><a href="blog_single.html">Blog Details</a></li>
									</ul>
								</li>                             
								
							</ul>
						</nav>
					</div><!--- END Col -->

					<!-- Boutons Ordinateur (visibles sur grand écran) -->
					<div class="col-20 d-none d-xl-flex justify-content-end align-items-center gap-3">
						<a href="{{ route('sign_in') }}" class="btn_one">
							Se connecter
						</a>

						<div class="dropdown">
							<button class="btn_one dropdown-toggle"
									type="button"
									data-bs-toggle="dropdown"
									aria-expanded="false">
								S'inscrire
							</button>

							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="{{ route('sign_up.apprenant') }}">
										S'inscrire comme Apprenant
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{ route('sign_up.formateur') }}">
										S'inscrire comme Formateur
									</a>
								</li>
							</ul>
						</div>
					</div>
					
					<!-- Menu Mobile (mis à jour avec les accès d'authentification) -->
					<ul class="mobile_menu">                        
						<li><a href="#">Accueil</a>
							<ul class="sub-menu">                                       
								<li><a href="{{ route('home') }}">Accueil1</a></li>
								                       
							</ul>
						</li>   
						<li><a href="{{ route('about') }}">A propos</a></li>                        
						<li><a href="#">Formations</a>
							<ul class="sub-menu">                                       
								<li><a href="{{ route('formations') }}">Formations</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children"><a href="blog.html">Cours Gratuit</a>
							<ul>                                        
								<li><a href="blog.html">Entrepreneuriat</a></li>
								
							</ul>
						</li> 

						<!-- Ajout des liens d'accès dans le menu mobile -->
						<li><a href="{{ route('sign_in') }}">Se connecter</a></li>
						<li class="menu-item-has-children"><a href="#">S'inscrire</a>
							<ul class="sub-menu">
								<li><a href="{{ route('sign_up.apprenant') }}">S'inscrire comme Apprenant</a></li>
								<li><a href="{{ route('sign_up.formateur') }}">S'inscrire comme Formateur</a></li>
							</ul>
						</li>
					</ul>           
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</div>    
		<!-- END NAVBAR -->

            @yield('content')


        <!-- START FOOTER -->
<footer class="skillora-footer">

    <div class="container">
        <div class="row">

            <!-- COLONNE 1 : LOGO + PRESENTATION -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="skillora-footer-about">

                    <a href="{{ url('/') }}" class="skillora-footer-logo">
                        <img src="{{ asset('assets/img/logo.png') }}"
                             alt="SkillOra">
                    </a>

                    <p>
                        SkillOra est une plateforme intelligente de formation
                        dédiée à l'acquisition de compétences pratiques et
                        professionnelles.
                    </p>

                    <p>
                        <strong>Apprendre. Pratiquer. Entreprendre.</strong>
                    </p>

                    <!-- RESEAUX SOCIAUX -->
                    <div class="skillora-social">

                        <a href="#" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a href="#" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a href="#" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>

                        <a href="#" aria-label="WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>

                    </div>

                </div>
            </div>


            <!-- COLONNE 2 : NAVIGATION -->
            <div class="col-lg-2 col-md-6 col-sm-6 mb-4">
                <div class="skillora-footer-widget">

                    <h4>Navigation</h4>

                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                Accueil
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">
                                À propos
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('formations') }}">
                                Formations
                            </a>
                        </li>

                        <li>
                            <a href="#formateurs">
                                Formateurs
                            </a>
                        </li>

                        <li>
                            <a href="#categories">
                                Catégories
                            </a>
                        </li>
                    </ul>

                </div>
            </div>


            <!-- COLONNE 3 : DOMAINES -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="skillora-footer-widget">

                    <h4>Nos domaines</h4>

                    <ul>
                        <li>
                            <a href="#categories">
                                Beauté & Esthétique
                            </a>
                        </li>

                        <li>
                            <a href="#categories">
                                Coiffure
                            </a>
                        </li>

                        <li>
                            <a href="#categories">
                                Cuisine
                            </a>
                        </li>

                        <li>
                            <a href="#categories">
                                Pâtisserie
                            </a>
                        </li>

                        <li>
                            <a href="#categories">
                                Onglerie
                            </a>
                        </li>

                        <li>
                            <a href="#categories">
                                Couture & Artisanat
                            </a>
                        </li>
                    </ul>

                </div>
            </div>


            <!-- COLONNE 4 : CONTACT -->
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="skillora-footer-widget">

                    <h4>Contactez-nous</h4>

                    <div class="skillora-contact">

                        <div class="skillora-contact-item">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>
                            </span>

                            <p>
                                Cameroun
                            </p>
                        </div>


                        <div class="skillora-contact-item">
                            <span>
                                <i class="fa-solid fa-phone"></i>
                            </span>

                            <p>
                                <a href="tel:+237000000000">
                                    +237 00 00 00 00
                                </a>
                            </p>
                        </div>


                        <div class="skillora-contact-item">
                            <span>
                                <i class="fa-brands fa-whatsapp"></i>
                            </span>

                            <p>
                                <a href="https://wa.me/237000000000"
                                   target="_blank">
                                    WhatsApp
                                </a>
                            </p>
                        </div>


                        <div class="skillora-contact-item">
                            <span>
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <p>
                                <a href="mailto:contact@skillora.com">
                                    contact@skillora.com
                                </a>
                            </p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</footer>
<!-- END FOOTER -->


<!-- START COPYRIGHT -->
<div class="skillora-copyright">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">
                <p>
                    © {{ date('Y') }} <strong>SkillOra</strong>.
                    Tous droits réservés.
                </p>
            </div>

            <div class="col-md-6 text-md-end">

                <a href="#">
                    Conditions d'utilisation
                </a>

                <span> | </span>

                <a href="#">
                    Politique de confidentialité
                </a>

            </div>

        </div>

    </div>

</div>
<!-- END COPYRIGHT -->
	
	<!-- Latest jQuery -->
		<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

		<script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery-simple-mobilemenu.js') }}"></script>
		<script src="{{ asset('assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>
		<script src="{{ asset('assets/js/scrolltopcontrol.js') }}"></script>
		<script src="{{ asset('assets/js/wow.min.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>