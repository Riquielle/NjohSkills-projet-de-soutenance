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
		<title>NjohSkills</title>			
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
						<div class="site-logo">
							<a href="{{ route('home') }}"><img src="assets/img/logo.png" alt=""></a>          				
						</div>
					</div><!--- END Col -->
					
					<div class="col-60 d-flex">
						<nav id="main-menu">
							<ul>
								<li class="menu-item-has-children"><a href="{{ route('home') }}">Accueil</a>
									<ul>										
										<li><a href="{{ route('home') }}">Accueil 01</a></li>
										<li><a href="{{ route('home2') }}">Accueil 02</a></li>
									</ul>
								</li>
								<li><a href="{{ route('about') }}">A propos</a></li>				  				  
								<li class="menu-item-has-children"><a href="{{ route('formations') }}">Formations</a>
									<ul>										
										<li><a href="{{ route('formations') }}">Formations</a></li>
										
									</ul>
								</li>								
								<li class="menu-item-has-children"><a href="#">Pages</a>
									<ul>										
										<li><a href="instructor.html">Instructor</a></li>
										<li><a href="ins_details.html">Instructor Details</a></li>
										<li><a href="pricing.html">Pricing Plan</a></li>
										<li><a href="faq.html">Faq Page</a></li>			
										<li><a href="404.html">404</a></li>				
									</ul>
								</li>							
								<li class="menu-item-has-children"><a href="blog.html">Blog</a>
									<ul>										
										<li><a href="blog.html">Blog</a></li>
										<li><a href="blog_single.html">Blog Details</a></li>
									</ul>
								</li>							  
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div><!--- END Col -->

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
					
					<ul class="mobile_menu">						
						<li><a href="{{ route('home') }}">Accueil</a>
							<ul class="sub-menu">										
								<li><a href="{{ route('home') }}">Accueil1</a></li>
								<li><a href="{{ route('home2') }}">Accueil2</a></li>						
							</ul>
						</li>	
						<li><a href="{{ route('about') }}">A propos</a></li>						
						<li><a href="#">Formations</a>
							<ul class="sub-menu">										
								<li><a href="course.html">Formations</a></li>
								<li><a href="course_details.html">Details des formations</a></li>									
							</ul>
						</li>
						<li><a href="#">Pages</a>
							<ul class="sub-menu">									
								<li><a href="instructor.html">Instructor</a></li>
								<li><a href="ins_details.html">Instructor Details</a></li>
								<li><a href="pricing.html">Pricing Plan</a></li>
								<li><a href="faq.html">Faq Page</a></li>			
								<li><a href="404.html">404</a></li>							
							</ul>
						</li>			
						<li><a href="blog.html">Blog</a>
							<ul class="sub-menu">										
								<li><a href="blog.html">Blog</a></li>
								<li><a href="blog_single.html">Blog Details</a></li>
							</ul>
						</li>						
						<li><a href="contact.html">Contact</a></li>
					</ul>			
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</div> 	  
		<!-- END NAVBAR -->	

            @yield('content')


        <!-- START FOOTER -->
		<div class="footer section-padding">
			<div class="container">				
				<div class="row">						
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single_footer">
							<a href="index.html"><img src="assets/img/logo.png" alt=""></a>         
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim.</p>
							<div class="social_profile">
								<ul>
									<li><a class="f_facebook" href="#"><i class="fa-solid fa-x"></i></a></li>
									<li><a class="f_twitter" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a class="f_instagram"href="#"><i class="fa-brands fa-instagram"></i></a></li>
									<li><a class="f_linkedin" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</div>
						</div>			
					</div><!--- END COL -->						
					<div class="col-lg-2 col-sm-6 col-xs-12">
						<div class="single_footer">
							<h4>About Eduleb</h4>
							<ul>
								<li><a href="#">About us</a></li>
								<li><a href="#">Instructor Registration</a></li>
								<li><a href="#">Become A Teacher</a></li>
								<li><a href="#">All Instrustors</a></li>
								<li><a href="#">Asked Question</a></li>
								<li><a href="#">Contact us</a></li>
							</ul>
						</div>
					</div><!--- END COL -->	
					<div class="col-lg-2 col-sm-6 col-xs-12">
						<div class="single_footer">
							<h4>Popular Courese</h4>
							<ul>
								<li><a href="#">Development</a></li>
								<li><a href="#">Arts & design</a></li>
								<li><a href="#">Visual Design</a></li>
								<li><a href="#">Graphic Design</a></li>
								<li><a href="#">Code Inspection</a></li>						
								<li><a href="#">Digital Marketing</a></li>						
							</ul>
						</div>
					</div><!--- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single_footer">
							<h4>Contact Info</h4>
							<div class="sf_contact">
								<span class="ti-map"></span>
								<p>2570 Quadra Street Victoria Road, New York, Canada</p>
							</div>
							<div class="sf_contact">
								<span class="ti-mobile"></span>
								<p>+88 457 845 695</p>
							</div>
							<div class="sf_contact">
								<span class="ti-mobile"></span>
								<p><a href="tel:+88457845695">Contact Whatsapp</a></p>
							</div>
							<div class="sf_contact">
								<span class="ti-email"></span>
								<p>example@yourmail.com</p>
							</div>
						</div>
					</div><!--- END COL -->						
					<div class="col-lg-2 col-sm-6 col-xs-12">
						<div class="single_footer">
							<h4>Download App</h4>
							<p>Download our app from app store and goole play store.</p>
							<a href="index.html"><img src="assets/img/google-play.jpg" class="foot_img" alt=""></a>  
							<a href="index.html"><img src="assets/img/app-store.jpg" class="foot_img" alt=""></a>  
						</div>
					</div><!--- END COL -->	
				</div><!--- END ROW -->					
			</div><!--- END CONTAINER -->
		</div>
		<!-- END FOOTER -->	

		<!-- START FOOTER COPYRIGHT -->	
		<div class="foot_copy">
			<div class="footer_copyright">
				<p>&copy; 2024. All Rights Reserved by <a href="https://bestwpware.com/">Bestwpware</a> • Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
			</div>	
		</div>
		<!-- END FOOTER COPYRIGHT -->	
	
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