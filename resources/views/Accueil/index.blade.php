@extends('Accueil.layouts.app')
@section('content')

		<!-- START HOME -->
		<section class="home_bg hb_height" 
			style="background-image: url('{{ asset('assets/img/bg/home-bg.jpg') }}'); background-size:cover; background-position: center center;">
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
		
			

					
		
		
		<!-- START TEAM -->
<!-- START TEAM -->
<section class="team_area section-padding skillora-team-area" id="formateurs">

    <div class="container">

        

		<div class="section-title text-center">

			<span class="section-subtitle skillora-section-title">
				Notre équipe
			</span>

			<h2>
				Découvrez nos
				<span>formateurs</span>
			</h2>

			<p>
				Des professionnels passionnés qui vous accompagnent
				dans l'acquisition de compétences pratiques.
			</p>

		</div>


        @if($formateurs->count() > 0)

            <div class="skillora-team-carousel">

                {{-- Flèche gauche --}}
                @if($formateurs->count() > 5)
                    <button type="button"
                            class="skillora-team-btn skillora-team-prev"
                            aria-label="Formateurs précédents">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                @endif


                <div class="skillora-team-viewport">

                    <div class="skillora-team-track">

                        @foreach($formateurs as $formateur)

                            <div class="skillora-team-slide">

                                <div class="our-team skillora-instructor-card">

                                    {{-- Photo du formateur --}}
									<div class="skillora-instructor-image">

										@if($formateur->user && $formateur->user->photo)

											<img src="{{ asset('storage/' . $formateur->user->photo) }}"
												alt="{{ $formateur->user->name }}"
												class="skillora-instructor-photo">

										@else

											<div class="skillora-default-avatar">
												<i class="fa-solid fa-user"></i>
											</div>

										@endif

									</div>


                                    {{-- Informations --}}
                                    <div class="skillora-instructor-info">

                                        <h3>
                                            {{ $formateur->user->prenom ?? '' }}
                                            {{ $formateur->user->nom ?? $formateur->user->name ?? '' }}
                                        </h3>

                                        <span class="skillora-speciality">

                                            {{ $formateur->specialite ?? 'Formateur SkillOra' }}

                                        </span>

                                    </div>


                                    {{-- Statistiques --}}
                                    <div class="skillora-instructor-footer">

                                        <div class="skillora-instructor-stat">

                                            <i class="fa-solid fa-book-open"></i>

                                            <div>

                                                <strong>
                                                    {{ $formateur->formations_count }}
                                                </strong>

                                                <small>
                                                    Formation{{ $formateur->formations_count > 1 ? 's' : '' }}
                                                </small>

                                            </div>

                                        </div>


                                        <div class="skillora-instructor-stat">

                                            <i class="fa-solid fa-briefcase"></i>

                                            <div>

                                                <strong>
                                                    {{ $formateur->experience ?? 0 }}
                                                </strong>

                                                <small>
                                                    Expérience
                                                </small>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Biographie --}}
                                    @if($formateur->biographie)

                                        <div class="skillora-instructor-bio">

                                            {{ Str::limit($formateur->biographie, 100) }}

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                {{-- Flèche droite --}}
                @if($formateurs->count() > 5)

                    <button type="button"
                            class="skillora-team-btn skillora-team-next"
                            aria-label="Formateurs suivants">

                        <i class="fa-solid fa-chevron-right"></i>

                    </button>

                @endif

            </div>


            {{-- Points de navigation --}}
            @if($formateurs->count() > 5)

                <div class="skillora-team-dots"></div>

            @endif


        @else

            <div class="text-center py-5">

                <i class="fa-solid fa-user-tie fa-3x mb-3"></i>

                <h4>
                    Aucun formateur disponible pour le moment.
                </h4>

                <p>
                    Les formateurs SkillOra seront bientôt présentés ici.
                </p>

            </div>

        @endif

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const track = document.querySelector('.skillora-team-track');
    const slides = document.querySelectorAll('.skillora-team-slide');
    const prevButton = document.querySelector('.skillora-team-prev');
    const nextButton = document.querySelector('.skillora-team-next');
    const dotsContainer = document.querySelector('.skillora-team-dots');

    if (!track || slides.length === 0) {
        return;
    }


    let currentIndex = 0;


    function getVisibleSlides() {

        const width = window.innerWidth;

        if (width <= 575) {
            return 1;
        }

        if (width <= 767) {
            return 2;
        }

        if (width <= 1199) {
            return 3;
        }

        return 5;
    }


    function getMaxIndex() {

        return Math.max(
            0,
            slides.length - getVisibleSlides()
        );

    }


    function updateSlider() {

        const visibleSlides = getVisibleSlides();

        if (currentIndex > getMaxIndex()) {
            currentIndex = getMaxIndex();
        }


        if (slides.length <= visibleSlides) {

            track.style.transform = 'translateX(0)';

            if (prevButton) {
                prevButton.style.display = 'none';
            }

            if (nextButton) {
                nextButton.style.display = 'none';
            }

            if (dotsContainer) {
                dotsContainer.style.display = 'none';
            }

            return;
        }


        if (prevButton) {
            prevButton.style.display = 'flex';

            prevButton.disabled =
                currentIndex === 0;
        }


        if (nextButton) {
            nextButton.style.display = 'flex';

            nextButton.disabled =
                currentIndex >= getMaxIndex();
        }


        /*
         * Calcul de la largeur d'une carte.
         */
        const slideWidth =
            slides[0].getBoundingClientRect().width;


        const gap =
            window.innerWidth <= 575 ? 0 : 20;


        const distance =
            currentIndex * (slideWidth + gap);


        track.style.transform =
            `translateX(-${distance}px)`;


        updateDots();

    }


    function createDots() {

        if (!dotsContainer) {
            return;
        }


        dotsContainer.innerHTML = '';


        const maxIndex = getMaxIndex();


        if (maxIndex <= 0) {

            dotsContainer.style.display = 'none';

            return;
        }


        dotsContainer.style.display = 'flex';


        for (let i = 0; i <= maxIndex; i++) {

            const dot =
                document.createElement('button');


            dot.type = 'button';


            dot.className =
                'skillora-team-dot';


            dot.setAttribute(
                'aria-label',
                'Afficher les formateurs ' + (i + 1)
            );


            dot.addEventListener(
                'click',
                function () {

                    currentIndex = i;

                    updateSlider();

                }
            );


            dotsContainer.appendChild(dot);

        }

    }


    function updateDots() {

        if (!dotsContainer) {
            return;
        }


        const dots =
            dotsContainer.querySelectorAll(
                '.skillora-team-dot'
            );


        dots.forEach(function (dot, index) {

            dot.classList.toggle(
                'active',
                index === currentIndex
            );

        });

    }


    /* ===============================
       BOUTON PRECEDENT
    =============================== */

    if (prevButton) {

        prevButton.addEventListener(
            'click',
            function () {

                if (currentIndex > 0) {

                    currentIndex--;

                    updateSlider();

                }

            }
        );

    }


    /* ===============================
       BOUTON SUIVANT
    =============================== */

    if (nextButton) {

        nextButton.addEventListener(
            'click',
            function () {

                if (currentIndex < getMaxIndex()) {

                    currentIndex++;

                    updateSlider();

                }

            }
        );

    }


    /* ===============================
       REDIMENSIONNEMENT
    =============================== */

    window.addEventListener(
        'resize',
        function () {

            currentIndex =
                Math.min(
                    currentIndex,
                    getMaxIndex()
                );


            createDots();

            updateSlider();

        }
    );


    /* ===============================
       INITIALISATION
    =============================== */

    createDots();

    updateSlider();

});
</script>
<!-- END TEAM -->
<!-- END TEAM -->
			

			

		<!-- START TESTIMONIALS -->
		
		<!-- END TESTINUNIALS -->

		<!-- START BLOG -->
		
		<!-- END BLOG -->	
		
@stop