<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<style>

@page{
    margin:0;
}

body{

    margin:0;
    padding:0;
    font-family: DejaVu Sans, sans-serif;
    background:#f8f9fa;

}

.certificat{

    width:100%;
    height:100vh;
    border:18px solid #0d6efd;
    padding:60px;
    box-sizing:border-box;
    position:relative;
    text-align:center;

}

.titre{

    font-size:48px;
    color:#0d6efd;
    font-weight:bold;
    margin-top:20px;

}

.sousTitre{

    font-size:22px;
    color:#555;
    margin-top:15px;

}

.nom{

    font-size:42px;
    font-weight:bold;
    color:#212529;
    margin:35px 0;

}

.formation{

    font-size:28px;
    color:#198754;
    font-weight:bold;
    margin:20px 0;

}

.description{

    font-size:18px;
    line-height:1.8;
    margin-top:30px;

}

.signature{

    width:250px;
    position:absolute;
    bottom:80px;
    left:80px;
    text-align:center;

}

.signature hr{

    border:1px solid #000;

}

.date{

    width:250px;
    position:absolute;
    bottom:80px;
    right:80px;
    text-align:center;

}

.date hr{

    border:1px solid #000;

}

.footer{

    position:absolute;
    bottom:20px;
    left:0;
    width:100%;
    text-align:center;
    color:#777;
    font-size:14px;

}

.logo{

    width:90px;

}

.numero{

    position:absolute;
    top:25px;
    right:35px;
    color:#666;
    font-size:14px;

}
.sceau{

    position:absolute;

    right:150px;

    top:260px;

    width:130px;

    opacity:.9;

}

</style>

</head>

<body>

<div class="certificat">

<div class="numero">

N° CERT-{{ date('Y') }}-{{ $inscription->id }}

</div>

{{-- Logo --}}
<img src="{{ public_path('assets/img/logo.png') }}" class="logo">

<div class="titre">

CERTIFICAT

</div>

<div class="sousTitre">

DE RÉUSSITE

</div>

<div class="description">

Ce certificat est décerné à

</div>

<div class="nom">

{{ $user->name }}

</div>

<div class="description">

pour avoir suivi avec succès la formation

</div>

<div class="formation">

{{ $formation->titre }}

</div>

<div class="description">

et satisfait à toutes les exigences pédagogiques de la plateforme
d'éducation en ligne.

</div>

<div class="signature">

<hr>

Le Formateur

</div>

<div class="date">

<hr>

Le {{ now()->format('d/m/Y') }}

</div>

<div class="footer">

Plateforme Intelligente d'Éducation en Ligne • Certificat officiel

</div>
<img src="{{ public_path('assets/img/seal.png') }}"
    class="sceau">

</div>

</body>

</html>