<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Formateur</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS Dashboard -->
    <link rel="stylesheet" href="{{ asset('assets/css/formation.css') }}">
</head>

<body>

<div class="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
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
                    Tableau de bord
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('Mes_formations') ? 'active' : '' }}"
                href="{{ route('Mes_formations') }}">
                    <i class="fas fa-book"></i>
                    Mes formations
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('A_formation') ? 'active' : '' }}"
                href="{{ route('A_formation') }}">
                    <i class="fas fa-plus-circle"></i>
                    Ajouter une formation
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('mes_apprenants') ? 'active' : '' }}"
                href="{{ route('mes_apprenants') }}">
                    <i class="fas fa-users"></i>
                    Apprenants
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('messages_formateur') ? 'active' : '' }}"
                href="#">
                    <i class="fas fa-comments"></i>
                    Messages
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('profil_formateur') ? 'active' : '' }}"
                href="{{ route('profil_formateur') }}">
                    <i class="fas fa-user"></i>
                    Mon profil
                </a>
            </li>

            <li>
                <a href="{{ route('sign_in') }}" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Déconnexion
                </a>
            </li>

        </ul>

    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Navbar -->
        <div class="topbar">

            <div>
                <h4>Tableau de bord </h4>
            </div>

            <div class="topbar-right">

                <button class="btn btn-light position-relative">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>

                <img src="https://via.placeholder.com/40"
                     class="profile-img"
                     alt="profile">

            </div>

        </div>

        @yield('content')

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>