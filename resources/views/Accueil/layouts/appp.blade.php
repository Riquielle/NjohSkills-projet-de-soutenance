<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','E-Learning')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Apprenant -->
    <link rel="stylesheet" href="{{ asset('assets/css/apprenant.css') }}">
</head>

<body>

<!-- ===========================
            NAVBAR
============================ -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold fs-1" href="/">
            <span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>
        </a>

        <!-- Bouton Burger Mobile -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard_ap') }}">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboardapprenant') }}">
                        Tableau de bord
                    </a>
                </li>
            </ul>

            <form class="d-flex me-lg-3 my-2 my-lg-0">
                <input class="form-control"
                       type="search"
                       placeholder="Rechercher">
            </form>

            <div class="dropdown mt-2 mt-lg-0">
                <a class="btn btn-light dropdown-toggle w-100 text-start"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="fa-solid fa-user-circle me-1"></i>
                    {{ Auth::user()->name }}
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('profil') }}">
                            Mon profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('ma_progression') }}">
                            Ma progression
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-message me-2"></i> Messages
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('mes_certificats') }}">
                            Mes certificats
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('sign_in') }}">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>

<!-- ===========================
            CONTENU
============================ -->
<main>
    @yield('content')
</main>

<!-- ===========================
            FOOTER
============================ -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row gy-4">
            <div class="col-lg-6">
                <h5>SkillUp</h5>
                <p>
                    Plateforme d'éducation en ligne dédiée aux compétences pratiques :
                    Couture, Coiffure, Cuisine, Esthétique, Maquillage...
                </p>
            </div>

            <div class="col-lg-3 col-6">
                <h6>Liens</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Formations</a></li>
                    <li><a href="#" class="text-white text-decoration-none">À propos</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6">
                <h6>Contact</h6>
                <p>contact@skillup.com</p>
            </div>
        </div>

        <hr>

        <div class="text-center">
            © 2026 SkillUp - Tous droits réservés.
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle (INCLUT POPPER.JS OBLIGATOIRE POUR LES DROPDOWNS ET MENUS MOBILE) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts spécifiques aux vues Blade enfant -->
@stack('scripts')

</body>
</html>