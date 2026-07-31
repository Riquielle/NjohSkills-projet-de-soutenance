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
        body{
            background:#f5f7fb;
        }

        .sidebar{
            width:260px;
            min-height:100vh;
            position:fixed;
            top:0;
            left:0;
            background:#0B1F3A;   /* Bleu sombre */
            color:#fff;
            box-shadow:4px 0 20px rgba(0,0,0,.15);
        }

        .content{
            margin-left:260px;
            padding:30px;
        }

        .sidebar .logo{
            font-size:24px;
            font-weight:700;
            padding:25px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.12);
            color:#fff;
        }

        /* Liens */

        .sidebar a{
            display:flex;
            align-items:center;
            gap:12px;
            padding:14px 22px;
            margin:8px 12px;
            border-radius:12px;
            color:#d6deeb;      /* Blanc légèrement grisé */
            text-decoration:none;
            transition:.3s;
            font-weight:500;
        }

        .sidebar a i{
            width:22px;
            text-align:center;
        }

        /* Survol */

        .sidebar a:hover{
            background:#1B3A66;
            color:#fff;
        }

        /* Page active */

        .sidebar a.active{
            background:#2E5B9A;
            color:#fff;
            font-weight:600;
            box-shadow:0 8px 18px rgba(0,0,0,.25);
        }

        .sidebar a.active i{
            color:#fff;
        }

        /* Déconnexion */

        .sidebar a.text-danger{
            color:#ff8c8c !important;
        }

        .sidebar a.text-danger:hover{
            background:#5c1f1f;
            color:#fff !important;
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