<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','E-Learning')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/apprenant.css') }}">

</head>
@stack('scripts')
<body>

<!-- ===========================
            NAVBAR
============================ -->

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold fs-1" href="/">
            <span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mx-auto">

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

            <form class="d-flex me-3">

                <input class="form-control"
                       type="search"
                       placeholder="Rechercher">

            </form>

            <div class="dropdown">

                <a class="btn btn-light dropdown-toggle"
                   href="#"
                   data-bs-toggle="dropdown">

                    <i class="fa-solid fa-user-circle"></i>

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
                            <i class="fa-solid fa-message me-2"></i>
                            Messages
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('mes_certificats') }}">
                            Mes certificats
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <a class="logout"
                           href="{{ route('sign_in') }}">
                           <i class="dropdown-item text-danger"></i>

                            Déconnexion

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

        <div class="row">

            <div class="col-lg-6">

                <h5>SkillUp</h5>

                <p>

                    Plateforme d'éducation en ligne dédiée
                    aux compétences pratiques :
                    Couture, Coiffure, Cuisine,
                    Esthétique, Maquillage...

                </p>

            </div>

            <div class="col-lg-3">

                <h6>Liens</h6>

                <ul class="list-unstyled">

                    <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>

                    <li><a href="#" class="text-white text-decoration-none">Formations</a></li>

                    <li><a href="#" class="text-white text-decoration-none">À propos</a></li>

                </ul>

            </div>

            <div class="col-lg-3">

                <h6>Contact</h6>

                <p>

                    contact@skillup.com

                </p>

            </div>

        </div>

        <hr>

        <div class="text-center">

            © 2026 SkillUp - Tous droits réservés.

        </div>

    </div>

</footer>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>