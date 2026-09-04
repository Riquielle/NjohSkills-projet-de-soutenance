<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Administration - NjohSkills')</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 260px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #e5e7eb;

            padding: 25px 15px;

            z-index: 1000;

            overflow-y: auto;

            transition: 0.3s ease;
        }


        .logo {

            font-size: 25px;

            font-weight: bold;

            color: #1977cc;

            text-align: center;

            margin-bottom: 35px;
        }


        .logo a {
            display: inline-block;
            white-space: nowrap;
        }

        .logo a span {
            margin: 0 !important;
            padding: 0 !important;
        }


        .admin-title {

            text-align: center;

            font-size: 13px;

            color: #777;

            margin-bottom: 25px;
        }


        .sidebar a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 13px 15px;

            margin-bottom: 8px;

            border-radius: 10px;

            text-decoration: none;

            color: #555;

            font-size: 15px;

            transition: 0.2s;
        }


        .sidebar a:hover,
        .sidebar a.active {

            background: #eaf4ff;

            color: #1977cc;
        }


        .sidebar a i {

            width: 20px;

            text-align: center;
        }


        /* =====================================================
           CONTENU
        ===================================================== */

        .main-content {

            margin-left: 260px;

            padding: 30px;

            min-height: 100vh;
        }


        /* =====================================================
           BOUTON MOBILE
        ===================================================== */

        .mobile-header {

            display: none;

            background: white;

            padding: 15px 20px;

            align-items: center;

            justify-content: space-between;

            box-shadow: 0 2px 10px rgba(0,0,0,0.05);

            position: sticky;

            top: 0;

            z-index: 900;
        }


        .mobile-menu-btn {

            border: none;

            background: #1977cc;

            color: white;

            width: 42px;

            height: 42px;

            border-radius: 8px;

            font-size: 19px;
        }


        .sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            background: rgba(0,0,0,0.35);

            z-index: 999;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .sidebar {

                left: -280px;

                width: 260px;

                box-shadow: 5px 0 20px rgba(0,0,0,0.1);
            }


            .sidebar.show {

                left: 0;
            }


            .sidebar-overlay.show {

                display: block;
            }


            .mobile-header {

                display: flex;
            }


            .main-content {

                margin-left: 0;

                padding: 20px;
            }

        }


        @media (max-width: 575px) {

            .main-content {

                padding: 15px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


{{-- =====================================================
     SIDEBAR
===================================================== --}}

<div
    class="sidebar"
    id="adminSidebar"
>

   <div class="logo">
    <a href="/" style="text-decoration: none; white-space: nowrap;">
        <span style="color: #1977cc; margin: 0; padding: 0;">Skill</span><span style="color: #28a745; margin: 0; padding: 0;">Ora</span>
    </a>
</div>


    <div class="admin-title">

        ESPACE ADMINISTRATEUR

    </div>


    {{-- DASHBOARD --}}

    <a
        href="{{ route('admin.dashboard') }}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
    >

        <i class="fas fa-chart-line"></i>

        Tableau de bord

    </a>


    {{-- APPRENANTS --}}

    <a
        href="{{ route('admin.apprenants.index') }}"
        class="{{ request()->routeIs('admin.apprenants*') ? 'active' : '' }}"
    >

        <i class="fas fa-user-graduate"></i>

        Apprenants

    </a>


    {{-- FORMATEURS --}}

    <a
        href="{{ route('admin.formateurs.index') }}"
        class="{{ request()->routeIs('admin.formateurs*') ? 'active' : '' }}"
    >

        <i class="fas fa-chalkboard-teacher"></i>

        Formateurs

    </a>


    {{-- FORMATIONS --}}

    <a
        href="{{ route('admin.formations.index') }}"
        class="{{ request()->routeIs('admin.formations*') ? 'active' : '' }}"
    >

        <i class="fas fa-book-open"></i>

        Formations

    </a>


    {{-- INSCRIPTIONS --}}

    <a
        href="{{ route('admin.inscriptions.index') }}"
        class="{{ request()->routeIs('admin.inscriptions*') ? 'active' : '' }}"
    >

        <i class="fas fa-user-check"></i>

        Inscriptions

    </a>


    {{-- PAIEMENTS --}}

    <a
        href="{{ route('admin.paiements.index') }}"
        class="{{ request()->routeIs('admin.paiements*') ? 'active' : '' }}"
    >

        <i class="fas fa-money-bill-wave"></i>

        Paiements

    </a>


    {{-- STATISTIQUES --}}

    <a
        href="{{ route('admin.statistiques.index') }}"
        class="{{ request()->routeIs('admin.statistiques*') ? 'active' : '' }}"
    >

        <i class="fas fa-chart-pie"></i>

        Statistiques

    </a>


    <hr>


    {{-- PARAMETRES --}}

    <a
        href="{{ route('admin.parametres.index') }}"
        class="{{ request()->routeIs('admin.parametres*') ? 'active' : '' }}"
    >

        <i class="fas fa-cog"></i>

        Paramètres

    </a>


    {{-- DECONNEXION --}}
    <a class="nav-link text-danger" href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt"></i> Déconnexion
    </a>
    

    

</div>


{{-- OVERLAY MOBILE --}}

<div
    class="sidebar-overlay"
    id="sidebarOverlay"
></div>



{{-- =====================================================
     HEADER MOBILE
===================================================== --}}

<div class="mobile-header">

    <strong class="text-primary">

        <a class="text-decoration-none" href="/">
            <span style="color:#ffffff;">Skill</span><span style="color:#28a745;">Ora</span>
        </a>

    </strong>


    <button
        class="mobile-menu-btn"
        id="mobileMenuBtn"
    >

        <i class="fas fa-bars"></i>

    </button>

</div>



{{-- =====================================================
     CONTENU DE LA PAGE
===================================================== --}}

<main class="main-content">

    @yield('content')

</main>



<script>

    const sidebar = document.getElementById('adminSidebar');

    const menuBtn = document.getElementById('mobileMenuBtn');

    const overlay = document.getElementById('sidebarOverlay');


    menuBtn.addEventListener('click', function () {

        sidebar.classList.toggle('show');

        overlay.classList.toggle('show');

    });


    overlay.addEventListener('click', function () {

        sidebar.classList.remove('show');

        overlay.classList.remove('show');

    });


    // Fermer le menu après avoir cliqué sur un lien
    document.querySelectorAll('.sidebar a').forEach(function(link) {

        link.addEventListener('click', function() {

            if (window.innerWidth <= 991) {

                sidebar.classList.remove('show');

                overlay.classList.remove('show');

            }

        });

    });

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


@stack('scripts')

</body>

</html>