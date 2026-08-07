<!-- Bouton burger mobile -->
<button class="btn btn-dark d-lg-none m-3" type="button" id="toggleSidebar">
    <i class="fa-solid fa-bars"></i> Menu
</button>

<!-- Votre Sidebar avec vos classes personnalisées -->
<div class="sidebar" id="mySidebar">
    <div class="logo">
        <a class="text-decoration-none" href="/">
            <span style="color:#ffffff;">Skill</span><span style="color:#28a745;">Ora</span>
        </a>
    </div>

    <a class="nav-link {{ request()->routeIs('dashboard_ap') ? 'active' : '' }}" href="{{ route('dashboard_ap') }}">
        <i class="fa-solid fa-house"></i> Accueil
    </a>

    <a class="nav-link {{ request()->routeIs('dashboardapprenant') ? 'active' : '' }}" href="{{ route('dashboardapprenant') }}">
        <i class="fa-solid fa-gauge-high"></i> Tableau de bord
    </a>

    <a class="nav-link {{ request()->routeIs('mesa_formations') ? 'active' : '' }}" href="{{ route('mesa_formations') }}">
        <i class="fas fa-book"></i> Mes formations
    </a>

    <a class="nav-link {{ request()->routeIs('ma_progression') ? 'active' : '' }}" href="{{ route('ma_progression') }}">
        <i class="fas fa-chart-line"></i> Ma progression
    </a>

    <a class="nav-link {{ request()->routeIs('mes_certificats') ? 'active' : '' }}" href="{{ route('mes_certificats') }}">
        <i class="fas fa-award"></i> Mes certificats
    </a>

    <a class="nav-link {{ request()->routeIs('assistant_ia') ? 'active' : '' }}" href="{{ route('assistant_ia') }}">
        <i class="fas fa-robot"></i> Assistant IA
    </a>

    <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">
        <i class="fas fa-user"></i> Mon profil
    </a>

    <hr style="border-color: rgba(255,255,255,0.15);">

    <a class="nav-link text-danger" href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt"></i> Déconnexion
    </a>
</div>

<!-- Script pour ouvrir le menu sur mobile -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('mySidebar');

        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('show');
            });
        }
    });
</script>