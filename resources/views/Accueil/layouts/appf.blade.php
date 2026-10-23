<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Formateur</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        .main-content img,
        .main-content video,
        .main-content iframe {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 575.98px) {
            .main-content .container,
            .main-content .container-fluid { padding-left: .75rem; padding-right: .75rem; }
            .main-content .btn { white-space: normal; }
            .main-content .modal-dialog { margin: .5rem; }
            .main-content .input-group { flex-wrap: wrap; }
            .main-content .input-group > .form-control { width: 100%; flex: 1 0 100%; }
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

        /* =========================================================
   MENU MOBILE TYPE APPLICATION
   ========================================================= */

/* Barre mobile cachée sur ordinateur */
.mobile-navbar {
    display: none;
}

.sidebar-overlay {
    display: none;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 767px) {

    /* -----------------------------------------
       BARRE DU HAUT MOBILE
       ----------------------------------------- */

    .mobile-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 64px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 0 16px;

        background: #ffffff;

        box-shadow: 0 2px 10px rgba(0,0,0,0.08);

        z-index: 2000;
    }


    /* LOGO MOBILE */

    .mobile-logo {
        font-size: 25px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }


    /* BOUTON HAMBURGER */

    .mobile-menu-btn {
        width: 44px;
        height: 44px;

        border: none;
        border-radius: 10px;

        background: #004085;
        color: white;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;

        cursor: pointer;

        transition: 0.3s ease;
    }

    .mobile-menu-btn:hover {
        background: #003366;
    }


    /* -----------------------------------------
       SIDEBAR MOBILE
       ----------------------------------------- */

    .sidebar {
    position: fixed;
    top: 0;
    left: 0;

    width: 280px;
    min-width: 280px;
    height: 100vh;

    z-index: 3000;

    transform: translateX(-100%);

    transition: transform 0.3s ease;

    overflow-y: auto;
}

.sidebar.mobile-open {
    transform: translateX(0);
}


    /* -----------------------------------------
       EN-TÊTE SIDEBAR
       ----------------------------------------- */

    .sidebar-header {
        padding: 25px 20px;
    }


    .sidebar-header .navbar-brand {
        font-size: 28px !important;
    }


    /* -----------------------------------------
       MENU
       ----------------------------------------- */

    .sidebar-menu {
        display: block;

        width: 100%;

        padding: 15px;
    }


    .sidebar-menu li {
        width: 100%;
        margin-bottom: 6px;
    }


    .sidebar-menu li a {
        width: 100%;

        padding: 14px 15px;

        display: flex;
        align-items: center;

        gap: 12px;

        font-size: 14px;
    }


    .sidebar-menu li a i {
        width: 22px;
        min-width: 22px;

        text-align: center;

        font-size: 16px;
    }


    /* -----------------------------------------
       OVERLAY
       ----------------------------------------- */

    .sidebar-overlay {
    position: fixed;
    inset: 0;

    width: 100vw;
    height: 100vh;

    background: rgba(0, 0, 0, 0.35);

    z-index: 2500;

    opacity: 0;
    visibility: hidden;
    pointer-events: none;

    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.sidebar-overlay.active {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

    /* -----------------------------------------
       CONTENU PRINCIPAL
       ----------------------------------------- */

    .wrapper {
        display: block;

        width: 100%;
    }


    .main-content {

        width: 100%;
        min-width: 100%;

        margin-left: 0;

        padding-top: 64px;
    }


    /* -----------------------------------------
       TOPBAR
       ----------------------------------------- */

    .topbar {

        min-height: 60px;

        padding: 10px 15px;

        gap: 10px;
    }


    .topbar h4 {
        font-size: 17px;
    }


    .topbar-right {
        gap: 8px;
    }


    .profile-img {
        width: 35px;
        height: 35px;
    }

}


/* =========================================================
   PETITS TÉLÉPHONES
   ========================================================= */

@media (max-width: 480px) {

    .mobile-navbar {
        height: 60px;

        padding: 0 12px;
    }


    .mobile-logo {
        font-size: 23px;
    }


    .mobile-menu-btn {
        width: 40px;
        height: 40px;

        font-size: 18px;
    }


    .sidebar {
        width: 270px;
        min-width: 270px;
    }


    .main-content {
        padding-top: 60px;
    }


    .topbar {
        padding: 9px 12px;
    }


    .topbar h4 {
        font-size: 16px;
    }

}


/* =========================================================
   TRÈS PETITS ÉCRANS
   ========================================================= */

@media (max-width: 360px) {

    .sidebar {
        width: 255px;
        min-width: 255px;
    }


    .mobile-logo {
        font-size: 21px;
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


        /* =========================================================
   EFFET FLOU DU CONTENU QUAND LE MENU MOBILE EST OUVERT
   ========================================================= */

        @media (max-width: 767px) {

            .main-content {
                transition: filter 0.3s ease, transform 0.3s ease;
            }

            body.menu-open .main-content {
                filter: blur(4px);
                transform: scale(0.995);
            }

            .sidebar-overlay {
                background: rgba(0, 0, 0, 0.30);
                backdrop-filter: none;
                -webkit-backdrop-filter: none;
            }

            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }

    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body>

<div class="wrapper">



        <!-- BARRE MOBILE -->
    <div class="mobile-navbar">

        <a href="/" class="mobile-logo">
            <span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>
        </a>

        <button type="button" class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>

    </div>

    <!-- FOND SOMBRE -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

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
                <a class="{{ request()->routeIs('messages.formateur') ? 'active' : '' }}"
                   href="{{ route('messages.formateur') }}">

                    <i class="fas fa-comments"></i>

                    <span>Messages</span>

                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('assistant_formateur') ? 'active' : '' }}"
                   href="{{ route('assistant_formateur') }}">

                    <i class="fas fa-robot"></i>

                    <span>Assistant IA</span>

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
                <h4></h4>
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

<script>
document.addEventListener('DOMContentLoaded', function () {

    const menuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (!menuBtn || !sidebar) {
        return;
    }


    /* ==========================================
       OUVRIR LE MENU
       ========================================== */

    menuBtn.addEventListener('click', function (event) {

        event.stopPropagation();

        sidebar.classList.add('mobile-open');

        if (overlay) {
            overlay.classList.add('active');
        }

        document.body.classList.add('menu-open');

        document.body.style.overflow = 'hidden';

    });


    /* ==========================================
       FERMER LE MENU
       ========================================== */

    function closeSidebar() {

        sidebar.classList.remove('mobile-open');

        if (overlay) {
            overlay.classList.remove('active');
        }

        document.body.classList.remove('menu-open');

        document.body.style.overflow = '';

    }


    /* ==========================================
       APPUYER N'IMPORTE OÙ SUR L'ÉCRAN
       ========================================== */

    document.addEventListener('click', function (event) {

        if (!sidebar.classList.contains('mobile-open')) {
            return;
        }

        /*
         * Si le menu est ouvert et qu'on touche
         * n'importe où, on ferme le menu.
         *
         * Le bouton hamburger est exclu.
         */

        if (!menuBtn.contains(event.target)) {
            closeSidebar();
        }

    });


    /* ==========================================
       TOUCHER L'ÉCRAN SUR MOBILE
       ========================================== */

    document.addEventListener('touchstart', function (event) {

        if (!sidebar.classList.contains('mobile-open')) {
            return;
        }

        if (!menuBtn.contains(event.target)) {
            closeSidebar();
        }

    }, { passive: true });


    /* ==========================================
       RETOUR À L'ÉCRAN DESKTOP
       ========================================== */

    window.addEventListener('resize', function () {

        if (window.innerWidth > 767) {

            closeSidebar();

        }

    });

});
</script>

<script>
document.querySelectorAll('.main-content table').forEach((table) => {
    if (!table.parentElement.classList.contains('table-responsive')) {
        const wrapper = document.createElement('div');
        wrapper.className = 'table-responsive';
        table.parentNode.insertBefore(wrapper, table);
        wrapper.appendChild(table);
    }
});
</script>

@include('components.assistant-panel')

</body>

</html>
