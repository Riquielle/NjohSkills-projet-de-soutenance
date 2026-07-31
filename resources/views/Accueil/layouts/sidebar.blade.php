<div class="sidebar">

    <div class="sidebar-header">
            <a class="navbar-brand fw-bold fs-1" href="/">
                <span style="color:#004085;">Skill</span><span style="color:#28a745;">Ora</span>
            </a>
            
    </div>



    <a class="nav-link {{ request()->routeIs('dashboard_ap') ? 'active' : '' }}"
   href="{{ route('dashboard_ap') }}">
    <i class="fa-solid fa-house me-2"></i>
    Accueil
    </a>

    <a class="nav-link {{ request()->routeIs('dashboardapprenant') ? 'active' : '' }}"
    href="{{ route('dashboardapprenant') }}">
        <i class="fa-solid fa-gauge-high me-2"></i>
        Tableau de bord
    </a>

    <a class="nav-link {{ request()->routeIs('mesa_formations') ? 'active' : '' }}"
    href="{{ route('mesa_formations') }}">
        <i class="fas fa-book me-2"></i>
        Mes formations
    </a>

    <a class="nav-link {{ request()->routeIs('ma_progression') ? 'active' : '' }}"
    href="{{ route('ma_progression') }}">
        <i class="fas fa-chart-line me-2"></i>
        Ma progression
    </a>

    <a class="nav-link {{ request()->routeIs('mes_certificats') ? 'active' : '' }}"
    href="{{ route('mes_certificats') }}">
        <i class="fas fa-award me-2"></i>
        Mes certificats
    </a>

    <a class="nav-link {{ request()->routeIs('assistant_ia') ? 'active' : '' }}"
    href="{{ route('assistant_ia') }}">
        <i class="fas fa-robot me-2"></i>
        Assistant IA
    </a>

    <a class="nav-link {{ request()->routeIs('profil') ? 'active' : ''}}"
    href="{{ route('profil') }}">
        <i class="fas fa-user me-2"></i>
        Mon profil
    </a>

    <hr>

    <a class="nav-link text-danger"
    href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt me-2"></i>
        Déconnexion
    </a>

</div>