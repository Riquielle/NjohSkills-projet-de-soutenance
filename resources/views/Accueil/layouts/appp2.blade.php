<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>@yield('title','Espace Apprenant')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
    body {
        background: #f5f7fb;
    }

    /* --- STYLE DESKTOP PAR DÉFAUT --- */
    .sidebar {
        width: 260px;
        min-height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: #0B1F3A;   /* Bleu sombre d'origine conservé */
        color: #fff;
        box-shadow: 4px 0 20px rgba(0,0,0,.15);
        z-index: 1050;
        transition: transform 0.3s ease-in-out;
    }

    .content {
        margin-left: 260px;
        padding: 30px;
        transition: margin-left 0.3s ease-in-out;
    }

    .sidebar .logo {
        font-size: 24px;
        font-weight: 700;
        padding: 25px;
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,.12);
        color: #fff;
    }

    /* Liens */
    .sidebar a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 22px;
        margin: 8px 12px;
        border-radius: 12px;
        color: #d6deeb;      /* Blanc légèrement grisé */
        text-decoration: none;
        transition: .3s;
        font-weight: 500;
    }

    .sidebar a i {
        width: 22px;
        text-align: center;
    }

    /* Survol */
    .sidebar a:hover {
        background: #1B3A66;
        color: #fff;
    }

    /* Page active */
    .sidebar a.active {
        background: #2E5B9A;
        color: #fff;
        font-weight: 600;
        box-shadow: 0 8px 18px rgba(0,0,0,.25);
    }

    .sidebar a.active i {
        color: #fff;
    }

    /* Déconnexion */
    .sidebar a.text-danger {
        color: #ff8c8c !important;
    }

    .sidebar a.text-danger:hover {
        background: #5c1f1f;
        color: #fff !important;
    }

    /* --- ADAPTATION MOBILE (Écrans < 992px) --- */
    @media (max-width: 991.98px) {
        /* La sidebar est masquée à gauche par défaut sur mobile */
        .sidebar {
            transform: translateX(-100%);
        }

        /* Quand on ajoute la classe .show (via le bouton burger), elle glisse */
        .sidebar.show {
            transform: translateX(0);
        }

        /* Le contenu prend toute la largeur sur mobile */
        .content {
            margin-left: 0;
            padding: 15px;
        }

        /* Overlay pour fermer le menu en cliquant sur l'écran */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
        }

        /* Affiche l'overlay sur mobile lorsque le menu est ouvert */
        @media (max-width: 991.98px) {
            .sidebar-overlay.show {
                display: block;
            }
        }
    }
</style>

</head>

<body>

@include('Accueil.layouts.sidebar')

<div class="content">

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>