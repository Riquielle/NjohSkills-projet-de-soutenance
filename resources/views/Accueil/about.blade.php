@extends('Accueil.layouts.app')
@section('content')

<!-- START SECTION TOP -->
		<section class="section-top" style="background-image: url('{{ asset('assets/img/bg/home-bg.jpg') }}'); background-size:cover; background-position: center center;">
			<div class="container">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h1>A propos</h1>
						<ul>
							<li><a href="{{route('home')}}">Accueil</a></li>
							<li> / A propos</li>
						</ul>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</section>	
		<!-- END SECTION TOP -->
		
		<!-- START CATEGORY -->
		<section class="top_cat__area section-padding" style="background-image: url('{{ asset('assets/img/bg/shape-1.png') }}'); background-size:cover; background-position: center center;">
			<div class="container">                                 
				<div class="section-title text-center">
					<h2>Transformez votre passion en un métier d'avenir</h2>
					<p>Découvrez une nouvelle manière d'apprendre les métiers manuels et créatifs. Maîtrisez la couture, la coiffure, la cosmétique et bien plus grâce à des cours vidéo ultra-pratiques pas-à-pas.</p>
				</div>                                      
				<div class="row">                   
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single_tp">
							<span class="sc_one">01</span>
							<h3>Maîtres <br />Artisans</h3>
							<p>Apprenez aux côtés de professionnels passionnés et reconnus dans leur domaine.</p>
						</div>
					</div><!-- END COL -->          
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="single_tp">
							<span class="sc_two">02</span>
							<h3>Pratique <br />à 100%</h3>
							<p>Des démonstrations vidéo en gros plan pour reproduire chaque geste avec précision.</p>
						</div>
					</div><!-- END COL -->          
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
						<div class="single_tp">
							<span class="sc_three">03</span>
							<h3>Apprentissage <br />Flexible</h3>
							<p>Formez-vous depuis chez vous, à votre rythme, sur votre smartphone ou votre PC.</p>
						</div>
					</div><!-- END COL -->  
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
						<div class="single_tp">
							<span class="sc_four">04</span>
							<h3>Accompagnement <br />Continu</h3>
							<p>Bénéficiez de retours personnalisés de vos formateurs sur vos réalisations.</p>
						</div>
					</div><!-- END COL -->                          
				</div><!-- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END CATEGORY -->       
			
		<!-- START ABOUT US -->
		<section class="ab_area section-padding">
			<div class="container">                                 
				<div class="row">                               
					<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="ab_img">
							<img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?auto=format&fit=crop&w=800&q=80" class="img-fluid" alt="Formation pratique couture et mode">
						</div>
					</div><!--- END COL -->                     
					<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="ab_content">
							<h2>La plateforme de référence pour maîtriser les métiers de la beauté et du style</h2>
							<p>Nous révolutionnons l'apprentissage des compétences pratiques. Que vous souhaitiez ouvrir votre salon de coiffure, lancer votre marque de vêtements ou fabriquer vos propres cosmétiques naturels, nous vous guidons étape par étape.</p>
							<p>Nos formations combinent théorie essentielle, exercices pratiques concrets et fiches techniques téléchargeables pour vous garantir une maîtrise professionnelle immédiate.</p>
							<ul>
								<li><span class="ti-check"></span> Accédez à plus de <b>120+</b> modules pratiques (couture, coiffure, esthétique...)</li>
								<li><span class="ti-check"></span> Patrons, recettes et fiches techniques téléchargeables</li>
								<li><span class="ti-check"></span> Attestation de suivi et conseils pour lancer votre propre activité</li>
							</ul>
							<a class="btn_one" href="course.html">Découvrir les formations <i class="ti-arrow-top-right"></i></a>
						</div>
					</div><!--- END COL -->                         
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END ABOUT US -->   

		<!-- START VIDEO -->
		<section class="vid_area va2" style="background-image: url(https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1200&q=80); background-size:cover; background-position: center center;">
			<div class="container">                                                             
				<div class="row">
					<div class="col-lg-12 vp_top wow fadeInUDown" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="video-area2">
							<a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup video-button"><i class="fa fa-play"></i></a>
						</div>
					</div><!--- END COL --> 
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END VIDEO -->

		<!-- START COUNTER -->
		<section class="count_area counter_feature">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single-counter">
							<span class="ti-folder sc_one"></span>
							<h2 class="counter-num">134</h2>
							<p>Tutoriels & Ateliers</p>
						</div>                          
					</div>
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single-counter">
							<span class="ti-medall-alt sc_two"></span>
							<h2 class="counter-num">15</h2>
							<p>Spécialités Pratiques</p>
						</div>
					</div><!-- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single-counter">
							<span class="ti-id-badge sc_three"></span>
							<h2 class="counter-num">684</h2>
							<p>Apprenants Certifiés</p>
						</div>
					</div><!-- END COL -->
					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="single-counter">
							<span class="ti-user sc_four"></span>
							<h2 class="counter-num">941</h2>
							<p>Membres Actifs</p>
						</div>
					</div><!-- END COL -->                      
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->       
		</section>
		<!-- END COUNTER -->

		<!-- START INSTRUCTOR+FREE COURSE -->
		<section class="insfreecourse section-padding">
			<div class="container">                                 
				<div class="row">                               
					<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single_ins" style="background-image: url(https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=800&q=80); background-size:cover; background-position: center center;">
							<div class="single_ins_content">
								<h4>Transmettez votre passion</h4>
								<h1>Devenez Formateur / Formatrice</h1>
								<p>Vous maîtrisez la couture, le tressage ou la formulation cosmétique ? Partagez votre savoir-faire et générez des revenus.</p>
								<a class="btn_one" href="#">Postuler maintenant <i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div><!--- END COL -->             
					<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="single_ins" style="background-image: url(https://images.unsplash.com/photo-1608248597261-e4d0450cbf1b?auto=format&fit=crop&w=800&q=80); background-size:cover; background-position: center center;">
							<div class="single_ins_content">
								<h4>Initiez-vous gratuitement</h4>
								<h1>Cours & Tutoriels Gratuits</h1>
								<p>Découvrez nos ateliers d'initiation offerts pour apprendre les bases de la création et du soin de soi.</p>
								<a class="btn_one" href="#">En profiter maintenant <i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div><!--- END COL -->                             
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END INSTRUCTOR+FREE COURSE -->            

		<!-- START TESTIMONIALS -->
		<section class="testi_area section-padding">
			<div class="container">
				<div class="section-title">
					<h2>Ce que disent nos apprenants <br />sur nos formations pratiques</h2>
				</div>                      
				<div class="row">                   
					<div class="col-lg-12 col-sm-12 col-xs-12">
						<div id="testimonial-slider2" class="owl-carousel">
							
							<div class="testimonial">
								<img src="assets/img/quote.png" alt="Guillemet" />
								<div class="testimonial_content">                                                 
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Grâce au cours de coupe et couture, j'ai pu confectionner mes premières robes sur mesure en seulement 3 semaines. Les explications en vidéo sont extrêmement claires et détaillées !</p>
								</div>
								<div class="testi_pic_title">
									<img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" alt="Marie K.">
									<h4>Marie K.</h4>
									<p>Apprenante en Couture</p>
								</div>
							</div><!-- END TESTIMONIAL -->

							<div class="testimonial">
								<img src="assets/img/quote.png" alt="Guillemet" />
								<div class="testimonial_content">                                                 
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Les techniques de coiffure et de pose de perruques sont expliquées avec une précision incroyable. J'ai pu ouvrir mon propre petit salon à domicile grâce à cette plateforme.</p>
								</div>
								<div class="testi_pic_title">
									<img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=200&q=80" alt="Aïcha B.">
									<h4>Aïcha B.</h4>
									<p>Styliste Capillaire</p>
								</div>
							</div><!-- END TESTIMONIAL -->

							<div class="testimonial">
								<img src="assets/img/quote.png" alt="Guillemet" />
								<div class="testimonial_content">                                                 
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>La formation en cosmétique naturelle est une révélation. J'ai appris à formuler des laits et savons sans produits chimiques nocifs. Le suivi de l'équipe est irréprochable.</p>
								</div>
								<div class="testi_pic_title">
									<img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=200&q=80" alt="Grace N.">
									<h4>Grace N.</h4>
									<p>Créatrice de Cosmétiques</p>
								</div>
							</div><!-- END TESTIMONIAL -->

						</div><!-- END TESTIMONIAL SLIDER -->
					</div><!-- END COL -->      
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->       
		</section>
		<!-- END TESTIMONIALS -->

	@stop