<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Formateur</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS Dashboard -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/formation.css') }}">


    <!-- =========================================================
         RESPONSIVE CSS - SKILLORA
         ========================================================= -->

    <style>

        /* =====================================================
           RÈGLES GÉNÉRALES
           ===================================================== */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        body {
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
        }


        /* =====================================================
           SIDEBAR - ORDINATEUR
           ===================================================== */

        .sidebar {
            width: 260px;
            min-width: 260px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-header {
            width: 100%;
            padding: 25px 20px;
            text-align: center;
        }

        .sidebar-header .navbar-brand {
            font-size: 30px !important;
            text-decoration: none;
            white-space: nowrap;
        }

        .sidebar-menu {
            width: 100%;
            margin: 0;
            padding: 15px;
            list-style: none;
        }

        .sidebar-menu li {
            width: 100%;
            margin-bottom: 5px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 15px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar-menu li a i {
            width: 20px;
            min-width: 20px;
            text-align: center;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            transform: translateX(2px);
        }

        .sidebar-menu li a.logout {
            margin-top: 20px;
        }


        /* =====================================================
           CONTENU PRINCIPAL - ORDINATEUR
           ===================================================== */

        .main-content {
            width: calc(100% - 260px);
            min-width: 0;
            margin-left: 260px;
            min-height: 100vh;
            padding: 0;
        }


        /* =====================================================
           TOPBAR
           ===================================================== */

        .topbar {
            width: 100%;
            min-height: 75px;
            padding: 15px 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .topbar h4 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
            flex-shrink: 0;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
        }


        /* =====================================================
           NOTIFICATIONS
           ===================================================== */

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;

            min-width: 19px;
            height: 19px;

            padding: 2px 5px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #dc3545;
            color: white;

            font-size: 11px;
            font-weight: 600;
        }

        .topbar .dropdown-menu {
            width: 350px;
            max-width: 90vw;
            max-height: 500px;
            overflow-y: auto;
        }

        .topbar .dropdown-item {
            white-space: normal;
        }


        /* =====================================================
           CONTENU DES PAGES
           ===================================================== */

        .main-content > * {
            max-width: 100%;
        }

        .main-content .container,
        .main-content .container-fluid {
            max-width: 100%;
        }

        .main-content .row {
            max-width: 100%;
        }

        .main-content table {
            width: 100%;
        }

        .main-content .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .main-content .card {
            max-width: 100%;
        }


        /* =====================================================
           TABLETTES
           992px → 1199px
           ===================================================== */

        @media (max-width: 1199px) {

            .sidebar {
                width: 230px;
                min-width: 230px;
            }

            .main-content {
                width: calc(100% - 230px);
                margin-left: 230px;
            }

            .sidebar-header {
                padding: 22px 15px;
            }

            .sidebar-header .navbar-brand {
                font-size: 27px !important;
            }

            .sidebar-menu {
                padding: 12px;
            }

            .sidebar-menu li a {
                padding: 12px 10px;
                font-size: 14px;
            }

            .topbar {
                padding: 15px 20px;
            }

            .topbar h4 {
                font-size: 20px;
            }
        }


        /* =====================================================
           TABLETTES PETITES
           768px → 991px
           ===================================================== */

        @media (max-width: 991px) {

            .sidebar {
                width: 200px;
                min-width: 200px;
            }

            .main-content {
                width: calc(100% - 200px);
                margin-left: 200px;
            }

            .sidebar-header {
                padding: 20px 10px;
            }

            .sidebar-header .navbar-brand {
                font-size: 24px !important;
            }

            .sidebar-menu {
                padding: 10px;
            }

            .sidebar-menu li a {
                gap: 8px;
                padding: 11px 8px;
                font-size: 13px;
            }

            .sidebar-menu li a i {
                width: 18px;
                min-width: 18px;
            }

            .topbar {
                padding: 12px 18px;
                min-height: 65px;
            }

            .topbar h4 {
                font-size: 18px;
            }

            .topbar-right {
                gap: 10px;
            }

            .profile-img {
                width: 36px;
                height: 36px;
            }
        }


        /* =====================================================
           TÉLÉPHONES
           576px → 767px
           ===================================================== */

        @media (max-width: 767px) {

            .wrapper {
                display: block;
                width: 100%;
            }


            /* ---------------------------------------------
               SIDEBAR MOBILE
               --------------------------------------------- */

            .sidebar {
                position: relative;
                top: auto;
                left: auto;

                width: 100%;
                min-width: 100%;
                min-height: auto;

                overflow: visible;
            }

            .sidebar-header {
                width: 100%;
                padding: 15px 20px;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar-header .navbar-brand {
                font-size: 26px !important;
            }

            .sidebar-menu {
                width: 100%;
                padding: 5px 15px 15px;

                display: flex;
                flex-wrap: wrap;
                justify-content: center;

                gap: 5px;
            }

            .sidebar-menu li {
                width: auto;
                margin: 0;
            }

            .sidebar-menu li a {
                width: auto;
                padding: 9px 10px;

                font-size: 13px;

                justify-content: center;
                gap: 6px;
            }

            .sidebar-menu li a i {
                width: auto;
                min-width: auto;
            }

            .sidebar-menu li a.logout {
                margin-top: 0;
            }


            /* ---------------------------------------------
               MAIN CONTENT
               --------------------------------------------- */

            .main-content {
                width: 100%;
                min-width: 100%;
                margin-left: 0;
            }


            /* ---------------------------------------------
               TOPBAR
               --------------------------------------------- */

            .topbar {
                width: 100%;

                padding: 12px 15px;

                min-height: 60px;

                display: flex;
                align-items: center;
                justify-content: space-between;

                gap: 10px;
            }

            .topbar h4 {
                font-size: 17px;
                margin: 0;
            }

            .topbar-right {
                gap: 8px;
            }

            .profile-img {
                width: 35px;
                height: 35px;
            }


            /* ---------------------------------------------
               NOTIFICATIONS
               --------------------------------------------- */

            .topbar .dropdown-menu {
                position: absolute !important;

                width: 320px !important;
                max-width: calc(100vw - 30px) !important;

                max-height: 70vh;

                overflow-y: auto;
            }

            .topbar .dropdown-item {
                padding: 12px !important;
            }

            .topbar .dropdown-item .d-flex {
                align-items: flex-start;
            }


            /* ---------------------------------------------
               CONTENU
               --------------------------------------------- */

            .main-content .container,
            .main-content .container-fluid {
                width: 100%;
                max-width: 100%;
                padding-left: 12px;
                padding-right: 12px;
            }

            .main-content .row {
                margin-left: 0;
                margin-right: 0;
            }

            .main-content .card {
                margin-bottom: 15px;
            }

            .main-content h1 {
                font-size: 25px;
            }

            .main-content h2 {
                font-size: 22px;
            }

            .main-content h3 {
                font-size: 20px;
            }

            .main-content h4 {
                font-size: 18px;
            }

            .main-content h5 {
                font-size: 17px;
            }

            .main-content h6 {
                font-size: 16px;
            }
        }


        /* =====================================================
           PETITS TÉLÉPHONES
           max-width: 575px
           ===================================================== */

        @media (max-width: 575px) {

            .sidebar-header {
                padding: 12px 15px;
            }

            .sidebar-header .navbar-brand {
                font-size: 24px !important;
            }

            .sidebar-menu {
                padding: 5px 10px 12px;
                gap: 4px;
            }

            .sidebar-menu li {
                width: 48%;
            }

            .sidebar-menu li a {
                width: 100%;
                padding: 9px 6px;

                font-size: 12px;

                text-align: center;
            }

            .sidebar-menu li a i {
                font-size: 13px;
            }


            /* ---------------------------------------------
               TOPBAR
               --------------------------------------------- */

            .topbar {
                padding: 10px 12px;
            }

            .topbar h4 {
                font-size: 16px;
            }

            .topbar-right {
                gap: 6px;
            }

            .topbar-right .btn {
                padding: 7px 9px;
            }

            .profile-img {
                width: 32px;
                height: 32px;
            }


            /* ---------------------------------------------
               NOTIFICATIONS
               --------------------------------------------- */

            .topbar .dropdown-menu {
                width: calc(100vw - 24px) !important;
                max-width: calc(100vw - 24px) !important;

                left: auto !important;
                right: 0 !important;
            }

            .topbar .dropdown-menu .p-3 {
                padding: 12px !important;
            }

            .topbar .dropdown-item {
                padding: 10px !important;
            }

            .topbar .dropdown-item .me-3 {
                margin-right: 8px !important;
            }

            .topbar .dropdown-item small {
                font-size: 12px;
                line-height: 1.4;
            }


            /* ---------------------------------------------
               CONTENU
               --------------------------------------------- */

            .main-content .container,
            .main-content .container-fluid {
                padding-left: 10px;
                padding-right: 10px;
            }

            .main-content h1 {
                font-size: 23px;
            }

            .main-content h2 {
                font-size: 21px;
            }

            .main-content h3 {
                font-size: 19px;
            }

            .main-content p {
                font-size: 14px;
            }

            .main-content .btn {
                max-width: 100%;
            }
        }


        /* =====================================================
           TRÈS PETITS TÉLÉPHONES
           max-width: 400px
           ===================================================== */

        @media (max-width: 400px) {

            .sidebar-header .navbar-brand {
                font-size: 22px !important;
            }

            .sidebar-menu li {
                width: 100%;
            }

            .sidebar-menu li a {
                justify-content: flex-start;
                padding-left: 15px;
            }

            .topbar h4 {
                font-size: 15px;
            }

            .topbar {
                padding: 9px 10px;
            }

            .profile-img {
                width: 30px;
                height: 30px;
            }

            .topbar .dropdown-menu {
                width: calc(100vw - 20px) !important;
                max-width: calc(100vw - 20px) !important;
            }
        }


        /* =====================================================
           ÉVITER LES DÉBORDEMENTS
           ===================================================== */

        .text-break {
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .main-content input,
        .main-content select,
        .main-content textarea {
            max-width: 100%;
        }

        .main-content .form-control,
        .main-content .form-select {
            width: 100%;
            max-width: 100%;
        }

        .main-content .btn {
            white-space: normal;
        }

    </style>

</head>


<body>

<div class="wrapper">


    <!-- =====================================================
         SIDEBAR
         ===================================================== -->

    <aside class="sidebar">

        <div class="sidebar-header">

            <a class="navbar-brand fw-bold fs-1" href="/">

                <span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>

            </a>

        </div>


        <ul class="sidebar-menu">

            <li>
                <a class="{{ request()->routeIs('dashboard_fo') ? 'active' : '' }}"
                   href="{{ route('dashboard_fo') }}">

                    <i class="fas fa-home"></i>

                    <span>Tableau de bord</span>

                </a>
            </li>


            <li>
                <a class="{{ request()->routeIs('Mes_formations') ? 'active' : '' }}"
                   href="{{ route('Mes_formations') }}">

                    <i class="fas fa-book"></i>

                    <span>Mes formations</span>

                </a>
            </li>


            <li>
                <a class="{{ request()->routeIs('A_formation') ? 'active' : '' }}"
                   href="{{ route('A_formation') }}">

                    <i class="fas fa-plus-circle"></i>

                    <span>Ajouter une formation</span>

                </a>
            </li>


            <li>
                <a class="{{ request()->routeIs('mes_apprenants') ? 'active' : '' }}"
                   href="{{ route('mes_apprenants') }}">

                    <i class="fas fa-users"></i>

                    <span>Apprenants</span>

                </a>
            </li>


            <li>
                <a class="{{ request()->routeIs('messages_formateur') ? 'active' : '' }}"
                   href="#">

                    <i class="fas fa-comments"></i>

                    <span>Messages</span>

                </a>
            </li>


            <li>
                <a class="{{ request()->routeIs('profil_formateur') ? 'active' : '' }}"
                   href="{{ route('profil_formateur') }}">

                    <i class="fas fa-user"></i>

                    <span>Mon profil</span>

                </a>
            </li>


            <li>
                <a href="{{ route('sign_in') }}"
                   class="logout">

                    <i class="fas fa-sign-out-alt"></i>

                    <span>Déconnexion</span>

                </a>
            </li>

        </ul>

    </aside>


    <!-- =====================================================
         MAIN CONTENT
         ===================================================== -->

    <main class="main-content">


        <!-- =================================================
             TOPBAR
             ================================================= -->

        <div class="topbar">

            <div>
                <h4>Tableau de bord</h4>
            </div>


            <div class="topbar-right">


                <!-- NOTIFICATIONS -->

                <div class="dropdown">

                    <button
                        class="btn btn-light position-relative"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-bell"></i>


                        @if(auth()->user()->unreadNotifications->count() > 0)

                            <span class="notification-badge">

                                {{ auth()->user()->unreadNotifications->count() }}

                            </span>

                        @endif

                    </button>


                    <div
                        class="dropdown-menu dropdown-menu-end shadow border-0 p-0"
                        style="width:350px; max-width:90vw;">


                        <!-- EN-TÊTE -->

                        <div class="p-3 border-bottom">

                            <h6 class="mb-0 fw-bold">

                                <i class="fas fa-bell me-2 text-primary"></i>

                                Notifications

                            </h6>

                        </div>


                        <!-- NOTIFICATIONS -->

                        @forelse(
                            auth()->user()->unreadNotifications->take(5)
                            as $notification
                        )

                            <a
                                href="{{ route('notifications.lire', $notification->id) }}"
                                class="dropdown-item p-3 border-bottom">

                                <div class="d-flex">

                                    <!-- ICÔNE -->

                                    <div class="me-3 flex-shrink-0">

                                        @if(
                                            ($notification->data['statut'] ?? '')
                                            === 'success'
                                        )

                                            <i class="fas fa-check-circle text-success fa-lg"></i>

                                        @else

                                            <i class="fas fa-exclamation-triangle text-warning fa-lg"></i>

                                        @endif

                                    </div>


                                    <!-- CONTENU -->

                                    <div class="text-break">

                                        <div class="fw-semibold">

                                            {{ $notification->data['formation_titre'] ?? 'Formation' }}

                                        </div>


                                        <small class="text-muted">

                                            {{ $notification->data['message'] ?? '' }}

                                        </small>


                                        <br>


                                        <small class="text-muted">

                                            {{ $notification->created_at->diffForHumans() }}

                                        </small>

                                    </div>

                                </div>

                            </a>

                        @empty

                            <div class="text-center p-4">

                                <i class="fas fa-bell-slash fa-2x text-muted mb-2"></i>

                                <p class="text-muted mb-0">

                                    Aucune nouvelle notification.

                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>


                <!-- IMAGE PROFIL -->

                <img
                    src="https://via.placeholder.com/40"
                    class="profile-img"
                    alt="profile">

            </div>

        </div>


        <!-- CONTENU DES PAGES -->

        @yield('content')


    </main>

</div>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>