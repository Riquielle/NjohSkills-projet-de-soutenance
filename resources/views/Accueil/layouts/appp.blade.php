<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'E-Learning')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Apprenant -->
    <link rel="stylesheet" href="{{ asset('assets/css/apprenant.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- ===========================
            NAVBAR
============================ -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">

        <!-- Logo adapté : plus petit sur mobile (fs-3) et grand sur PC (fs-1) -->
        <a class="navbar-brand fw-bold fs-3 fs-lg-1 my-0 py-0" href="/">
            <span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>
        </a>

        <!-- Bouton Burger Mobile -->
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">

            <ul class="navbar-nav mx-auto mb-3 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->routeIs('dashboard_ap') ? 'active fw-bold' : '' }}" href="{{ route('dashboard_ap') }}">
                        <i class="fa-solid fa-house me-2 d-lg-none"></i>Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->routeIs('dashboardapprenant') ? 'active fw-bold' : '' }}" href="{{ route('dashboardapprenant') }}">
                        <i class="fa-solid fa-gauge-high me-2 d-lg-none"></i>Tableau de bord
                    </a>
                </li>
            </ul>

            <!-- Barre de recherche -->
            <form class="d-flex me-lg-3 my-2 my-lg-0" role="search">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input class="form-control bg-light border-start-0" type="search" placeholder="Rechercher..." aria-label="Search">
                </div>
            </form>

            <!-- Profil Utilisateur -->
            <div class="dropdown mt-3 mt-lg-0 border-top border-lg-0 pt-3 pt-lg-0">
                <a class="btn btn-outline-secondary dropdown-toggle w-100 text-start text-lg-center d-flex align-items-center justify-content-between"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <span>
                        <i class="fa-solid fa-user-circle me-2 fs-5 align-middle"></i>
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end w-100 w-lg-auto shadow">
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('profil') }}">
                            <i class="fa-solid fa-id-card me-2 text-muted"></i>Mon profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('ma_progression') }}">
                            <i class="fa-solid fa-chart-line me-2 text-muted"></i>Ma progression
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <i class="fa-solid fa-envelope me-2 text-muted"></i>Messages
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('mes_certificats') }}">
                            <i class="fa-solid fa-award me-2 text-muted"></i>Mes certificats
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item py-2 text-danger fw-semibold" href="{{ route('sign_in') }}">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>Déconnexion
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
<main class="flex-grow-1">
    @yield('content')
</main>

<!-- ===========================
            FOOTER
============================ -->
<footer class="bg-dark text-white mt-auto">
    <div class="container py-4">
        <div class="row gy-4">
            <div class="col-lg-6 col-12">
                <h5 class="fw-bold">SkillOra</h5>
                <p class="text-white-50 small">
                    Plateforme d'éducation en ligne dédiée aux compétences pratiques :
                    Couture, Coiffure, Cuisine, Esthétique, Maquillage...
                </p>
            </div>

            <div class="col-lg-3 col-6">
                <h6 class="fw-bold">Navigation</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Accueil</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Formations</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">À propos</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6">
                <h6 class="fw-bold">Contact</h6>
                <p class="text-white-50 small"><i class="fa-solid fa-envelope me-2"></i>contact@skillup.com</p>
            </div>
        </div>

        <hr class="border-secondary my-3">

        <div class="text-center text-white-50 small">
            © 2026 SkillOra - Tous droits réservés.
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts spécifiques aux vues Blade enfant -->
@stack('scripts')

</body>
</html>