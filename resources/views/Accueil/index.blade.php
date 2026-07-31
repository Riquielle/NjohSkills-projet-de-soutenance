@extends('Accueil.layouts.app')
@section('content')

		<!-- START HOME -->
		<section class="home_bg hb_height" style="background-image: url(assets/img/bg/home-bg.jpg);  background-size:cover; background-position: center center;">
			<div class="container">
				<div class="row">
				  <div class="col-lg-7 col-sm-10 col-xs-12">
						<div class="hero-text ht_top"> 
							<h1>Développez vos<span> compétences pratiques </span> avec des formations professionnelles</h1> 
							<p>AvecSkillOra, aprennez, pratiquez et entreprenez</p> </div>
				  </div><!--- END COL -->
				  <div class="col-lg-6 col-sm-12 col-xs-12">
					<div class="hero-text-img">
						<img src="assets/img/home-img2.png" class="img-fluid" alt="" />
						<div class="home_ps">

							<span class="ti-user"></span>

							<h2>
								{{ $nombreApprenants }}
							</h2>

							<p>
								Apprenants inscrits
							</p>

						</div>

						<div class="home_ps">

							<span class="ti-book"></span>

							<h2>
								{{ $nombreFormations }}
							</h2>

							<p>
								Formations pratiques
							</p>

						</div>
					</div>					
				  </div><!--- END COL -->						  
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END  HOME -->			

		<!-- START COUNTER -->
		<section class="count_area counter_feature">

			<div class="container">

				<div class="row">


					<div class="col-lg-3 col-sm-6 col-xs-12">

						<div class="single-counter">

							<span class="ti-book sc_one"></span>

							<h2 class="counter-num">
								{{ $nombreFormations }}
							</h2>

							<p>
								Formations pratiques
							</p>

						</div>

					</div>


					


					<div class="col-lg-3 col-sm-6 col-xs-12">

						<div class="single-counter">

							<span class="ti-id-badge sc_three"></span>

							<h2 class="counter-num">
								{{ $nombreFormateurs }}
							</h2>

							<p>
								Apprenants accompagnés
							</p>

						</div>

					</div>


					<div class="col-lg-3 col-sm-6 col-xs-12">

						<div class="single-counter">

							<span class="ti-user sc_four"></span>

							<h2 class="counter-num">
								{{ $nombreFormateurs }}
							</h2>

							<p>
								Formateurs experts
							</p>

						</div>

					</div>


				</div>

			</div>

		</section>
		<!-- END COUNTER -->

	<!-- START CATEGORY -->
	<section class="top_cat__area section-padding" style="background-image: url(assets/img/bg/shape-1.png); background-size:cover; background-position: center center;">
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
	
	<!-- START CATEGORY -->
	<section class="top_cat__area section-padding" style="background-image: url(assets/img/bg/section-2.jpg);  background-size:cover; background-position: center center;">
		<div class="container">									
			

			<div class="section-title text-center">

				<h2>
					Découvrez les compétences les plus demandées
				</h2>

				<p>
					Avec SkillOra, développez des compétences pratiques,
					apprenez un métier et préparez-vous à créer votre propre activité.
					Choisissez une formation adaptée à vos objectifs professionnels.
				</p>

			</div>						
			<div class="row">													
				<div class="col-lg-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
					<div class="cat_list">
						<ul>
							<li><a href="#"><img src="assets/img/e1.png" alt="category-image" /> Beauté et esthétique</a></li>
							<li><a href="#"><img src="assets/img/e2.png" alt="category-image" /> Coiffure</a></li>
							<li><a href="#"><img src="assets/img/e3.png" alt="category-image" /> Cuisine</a></li>
							<li><a href="#"><img src="assets/img/e4.png" alt="category-image" /> Onglerie</a></li>
							<li><a href="#"><img src="assets/img/e5.png" alt="category-image" /> Patisserie</a></li>
							<li><a href="#"><img src="assets/img/e6.png" alt="category-image" /> Artisanat</a></li>
							<li><a href="#"><img src="assets/img/e7.png" alt="category-image" /> Couture</a></li>
														
						</ul>
					</div>
				</div><!--- END COL -->							  
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END CATEGORY -->	
	 <br>
	 <br>		

		<!-- START COURSE -->
		
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2>Toutes les formations</h2>
                    <a href="#" class="btn btn-outline-primary">Voir tout</a>
                </div>

                <div class="row">
                    @forelse($formations as $formation)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                            @if($formation->image)
                                <img src="{{ asset('storage/'.$formation->image) }}" 
                                     class="card-img-top" 
                                     style="height: 200px; object-fit: cover;" 
                                     alt="{{ $formation->titre }}">
                            @else
                                <img src="{{ asset('assets/img/default-course.jpg') }}" 
                                     class="card-img-top" 
                                     style="height: 200px; object-fit: cover;" 
                                     alt="Formation">
                            @endif

                            <div class="card-body d-flex flex-column p-4">
                                <div>
                                    <span class="badge bg-primary mb-2">
                                        {{ $formation->formateur->specialite ?? 'Général' }}
                                    </span>
                                    <h4 class="h5 fw-bold text-dark mb-2 text-truncate">
                                        {{ $formation->titre }}
                                    </h4>
                                    <p class="text-muted small mb-3">
                                        {{ Str::limit($formation->description, 80) }}
                                    </p>
                                </div>

                                <div class="mt-auto d-flex justify-content-between align-items-center border-top pt-3">
                                    <small class="text-warning">⭐⭐⭐⭐⭐</small>
                                    <a href="{{ route('details_formations', $formation->id) }}" class="btn btn-sm btn-outline-primary fw-semibold">
                                        Voir plus →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Aucune formation disponible pour le moment.
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
		<!-- END COURSE -->	
		
		<!-- START COMPANY PARTNER LOGO  -->
		<div class="partner-logo section-padding">
			<div class="container">
				<div class="row part_bg">
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="partner_title">
							<h3>Helping <span>86,000+</span> global companies take the gloves off </h3>
						</div>					
					</div><!-- END COL  -->
					<div class="col-lg-8 col-sm-8 col-xs-12 text-center">
						<div class="partner">
							<a href="#"><img src="assets/img/clients/1.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/2.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/3.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/4.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/5.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/2.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/1.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/3.png" alt="image"></a>
							<a href="#"><img src="assets/img/clients/4.png" alt="image"></a>
						</div>
					</div><!-- END COL  -->
				</div><!--END  ROW  -->
			</div><!-- END CONTAINER  -->
		</div>
		<!-- END COMPANY PARTNER LOGO -->	

		<!-- START VIDEO -->
		<section class="vid_area section-padding">
			<div class="container">																
				<div class="row">
					<div class="col-lg-12 vp_top wow fadeInUDown" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<div class="video-area" style="background-image: url(assets/img/bg/video.jpg);  background-size:cover; background-position: center center;">
							<a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup video-button"><i class="fa fa-play"></i></a>
						</div>
					</div><!--- END COL -->	
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END VIDEO -->			
		
		<!-- START TEAM -->
		<section class="team_area section-padding">
			<div class="container">									
				<div class="section-title text-center">
					<h2>Meet our Instructors</h2>
					<p>We offer a brand new approach to the most basic learning paradigms. Choose from a wide range of learning options and gain new skills! Our school is know.</p>
				</div>						
				<div class="row">													
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="our-team">
							<div class="team-content">
								<a href="#"><img src="assets/img/team/team1.jpg" alt=""></a>
								<ul class="social-links">
									<li><a href="#"><i class="fa-solid fa-x"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<div class="team-prof">
								<h3>Bilkis Vabi</h3>
								<span>Web designer</span>
							</div>
							<div class="sth_det2">
								<span class="ti-file"> <u>04 Course</u></span>
								<span class="ti-user"> <u>27 Student</u></span>
							</div>									
						</div>
					</div><!--- END COL -->										
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="our-team">
							<div class="team-content">
								<a href="#"><img src="assets/img/team/team2.jpg" alt=""></a>
								<ul class="social-links">
									<li><a href="#"><i class="fa-solid fa-x"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<div class="team-prof">
								<h3>Mood Wasim</h3>
								<span>TemplateMonster company</span>
							</div>
							<div class="sth_det2">
								<span class="ti-file"> <u>06 Course</u></span>
								<span class="ti-user"> <u>41 Student</u></span>
							</div>							
						</div>
					</div><!--- END COL -->										
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="our-team">
							<div class="team-content">
								<a href="#"><img src="assets/img/team/team3.jpg" alt=""></a>
								<ul class="social-links">
									<li><a href="#"><i class="fa-solid fa-x"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<div class="team-prof">
								<h3>Shyinn tim</h3>
								<span>Codecanyou</span>
							</div>
							<div class="sth_det2">
								<span class="ti-file"> <u>13 Course</u></span>
								<span class="ti-user"> <u>31 Student</u></span>
							</div>
						</div>
					</div><!--- END COL -->										
					<div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="our-team">
							<div class="team-content">
								<a href="#"><img src="assets/img/team/team4.jpg" alt=""></a>
								<ul class="social-links">
									<li><a href="#"><i class="fa-solid fa-x"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
								</ul>
							</div>
							<div class="team-prof">
								<h3>Shorif shorifa</h3>
								<span>Tsc chottor</span>
							</div>
							<div class="sth_det2">
								<span class="ti-file"> <u>07 Course</u></span>
								<span class="ti-user"> <u>24 Student</u></span>
							</div>
						</div>
					</div><!--- END COL -->							  
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
		<!-- END TEAM -->	

	<!-- START PROMO -->
	<section class="ab_area section-padding">
		<div class="container">									
			<div class="row">													
				<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
					<div class="ab_content">
						<h2>Why Choose Us For Your Online Education Courses</h2>
						<p>We offer a brand new approach to the most basic learning paradigms. Choose from a wide range of learning options and gain new skills! Our school is know.</p>
						<p>We offer a brand new approach to the most basic learning paradigms. Choose from a wide range of learning options and gain new skills! Our school is know.</p>
						<ul>
							<li><span class="ti-check"></span> Get access to <b>12,000+</b> of our top courses</li>
							<li><span class="ti-check"></span> Popular topic to learn now in our online courses for student</li>
							<li><span class="ti-check"></span> Find the right instructor for you</li>
						</ul>
						<a class="btn_one" href="course.html">View All Courses <i class="ti-arrow-top-right"></i></a>
					</div>
				</div><!--- END COL -->	
				<div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
					<div class="ab_img">
						<img src="assets/img/about3.png" class="img-fluid" alt="image">
						<div class="home_ps2">
							<span class="ti-book"></span>
							<h2>3300+</h2>
							<p>Online Course</p>
						</div>
					</div>
				</div><!--- END COL -->					
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END PROMO -->			

		<!-- START TESTIMONIALS -->
		<section class="testi_area section-padding">
			<div class="container">
				<div class="section-title">
					<h2>What Student’s Say To Do <br />Their Online Course</h2>
				</div>						
				<div class="row">
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div class="ab_img">
							<img src="assets/img/review.png" class="img-fluid" alt="image">
						</div>					
					</div><!-- END COL -->						
					<div class="col-lg-6 col-sm-12 col-xs-12">
						<div id="testimonial-slider" class="owl-carousel">
							<div class="testimonial">
								<img src="assets/img/quote.png" alt="" />
								<div class="testimonial_content">													
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Aqestic optio amet a ququam saepe aliquid voluate dicta fuga dolor saerror sed earum a magni soluta quam minus dolor dolor sed earum a magni soluta autem dolor error error sit quam minus sint rem a rerum dolobus veritatis delectus.</p>
								</div>
								<div class="testi_pic_title">
									<img src="assets/img/testimonial/1.png" alt="">
									<h4>Ajmain Adil</h4>
									<p>Groton Inc</p>
								</div>
							</div><!-- END TESTIMONIAL -->
							<div class="testimonial">
							<img src="assets/img/quote.png" alt="" />
								<div class="testimonial_content">													
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Aqestic optio amet a ququam saepe aliquid voluate dicta fuga dolor saerror sed earum a magni soluta quam minus dolor dolor sed earum a magni soluta autem dolor error error sit quam minus sint rem a rerum dolobus veritatis delectus.</p>
								</div>
								<div class="testi_pic_title">
									<img src="assets/img/testimonial/2.png" alt="">
									<h4>Sharukh Khan</h4>
									<p>Red Chili Inc</p>
								</div>
							</div><!-- END TESTIMONIAL -->
							<div class="testimonial">
								<img src="assets/img/quote.png" alt="" />
								<div class="testimonial_content">													
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Aqestic optio amet a ququam saepe aliquid voluate dicta fuga dolor saerror sed earum a magni soluta quam minus dolor dolor sed earum a magni soluta autem dolor error error sit quam minus sint rem a rerum dolobus veritatis delectus.</p>
								</div>
								<div class="testi_pic_title">
									<img src="assets/img/testimonial/3.png" alt="">
									<h4>Anushka sharma</h4>
									<p>Naika Company</p>
								</div>
							</div><!-- END TESTIMONIAL -->
							<div class="testimonial">
								<img src="assets/img/quote.png" alt="" />
								<div class="testimonial_content">													
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Aqestic optio amet a ququam saepe aliquid voluate dicta fuga dolor saerror sed earum a magni soluta quam minus dolor dolor sed earum a magni soluta autem dolor error error sit quam minus sint rem a rerum dolobus veritatis delectus.</p>
								</div>
								<div class="testi_pic_title">
									<img src="assets/img/testimonial/4.png" alt="">
									<h4>Ajmain Adil</h4>
									<p>Groton Inc</p>
								</div>
							</div><!-- END TESTIMONIAL -->
							<div class="testimonial">
								<img src="assets/img/quote.png" alt="" />
								<div class="testimonial_content">													
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<i class="ti-star"></i>
									<p>Aqestic optio amet a ququam saepe aliquid voluate dicta fuga dolor saerror sed earum a magni soluta quam minus dolor dolor sed earum a magni soluta autem dolor error error sit quam minus sint rem a rerum dolobus veritatis delectus.</p>
								</div>
								<div class="testi_pic_title">
									<img src="assets/img/testimonial/5.png" alt="">
									<h4>Ajmain Adil</h4>
									<p>Groton Inc</p>
								</div>
							</div><!-- END TESTIMONIAL -->
						</div><!-- END TESTIMONIAL SLIDER -->
					</div><!-- END COL -->		
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->		
		</section>
		<!-- END TESTINUNIALS -->

		<!-- START BLOG -->
		<section id="blog" class="blog_area section-padding">
			<div class="container">
				<div class="section-title text-center">
					<h2>Latest Blog & news</h2>
					<p>We offer a brand new approach to the most basic learning paradigms. Choose from a wide range of learning options and gain new skills! Our school is know.</p>
				</div>	
				<div class="row">		
					<div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single_blog">
							<img src="assets/img/blog/1.jpg" class="img-fluid" alt="image" />
							<div class="content_box">
								<span>May 10, 2024 | <a href="blog.html">Education</a></span>
								<h2><a href="blog.html">Professional Mobile Painting and Sculpting</a></h2>
								<a class="btn_one" href="blog.html">Read More <i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div><!-- END COL-->				
					<div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
						<div class="single_blog">
							<img src="assets/img/blog/2.jpg" class="img-fluid" alt="image" />
							<div class="content_box">
								<span>May 16, 2024 | <a href="blog.html">Education</a></span>
								<h2><a href="blog.html">Professional Ceramic Moulding for Beginner</a></h2>
								<a class="btn_one" href="blog.html">Read More <i class="ti-arrow-top-right"></i></a>							
							</div>
						</div>
					</div><!-- END COL-->
					<div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<div class="single_blog">
							<img src="assets/img/blog/3.jpg" class="img-fluid" alt="image" />
							<div class="content_box">
								<span>May 18, 2024 | <a href="blog.html">Programing</a></span>
								<h2><a href="blog.html">Education Is About Create Leaders For Tomorrow </a></h2>
								<a class="btn_one" href="blog.html">Read More <i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div><!-- END COL-->						
				</div><!-- / END ROW -->
			</div><!-- END CONTAINER  -->
		</section>	
		<!-- END BLOG -->	
		
@stop