<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>Certificat de réussite</title>

    <style>

        @page {
            size: A4 landscape;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 297mm;
            height: 210mm;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f8f6ef;
            color: #333;
        }

        /* =========================
           PAGE DU CERTIFICAT
        ========================= */

        .certificate {
            width: 297mm;
            height: 210mm;
            position: relative;
            background: #fffdf8;
            padding: 12mm;
        }

        /* =========================
           BORDURES
        ========================= */

        .outer-border {
            position: absolute;
            top: 7mm;
            left: 7mm;
            right: 7mm;
            bottom: 7mm;

            border: 3px solid #198754;
        }

        .inner-border {
            position: absolute;
            top: 11mm;
            left: 11mm;
            right: 11mm;
            bottom: 11mm;

            border: 1px solid #c9a227;
        }

        /* =========================
           CONTENU CENTRAL
        ========================= */

        .content {
            position: relative;
            z-index: 10;

            width: 245mm;

            margin: 0 auto;

            text-align: center;

            padding-top: 10mm;
        }

        /* =========================
           NOM PLATEFORME
        ========================= */

        .brand {
            font-size: 21px;
            font-weight: bold;

            letter-spacing: 5px;

            color: #198754;

            text-transform: uppercase;

            margin-bottom: 3mm;
        }

        .gold-line {
            width: 55mm;
            height: 1px;

            background: #c9a227;

            margin: 0 auto 5mm auto;
        }

        /* =========================
           SOUS-TITRE
        ========================= */

        .small-title {
            font-size: 10px;

            letter-spacing: 3px;

            text-transform: uppercase;

            color: #777;

            margin-bottom: 3mm;
        }

        /* =========================
           TITRE
        ========================= */

        .title {
            font-family: DejaVu Serif, serif;

            font-size: 30px;

            font-weight: bold;

            letter-spacing: 2px;

            color: #1b5e20;

            margin-bottom: 4mm;
        }

        /* =========================
           TEXTE
        ========================= */

        .intro {
            font-size: 12px;

            color: #555;

            margin-bottom: 3mm;
        }

        /* =========================
           NOM APPRENANT
        ========================= */

        .student-name {
            font-family: DejaVu Serif, serif;

            font-size: 27px;

            font-weight: bold;

            color: #222;

            margin-bottom: 2mm;
        }

        .student-line {
            width: 90mm;

            height: 1px;

            background: #c9a227;

            margin: 0 auto 5mm auto;
        }

        /* =========================
           TEXTE FORMATION
        ========================= */

        .description {
            font-size: 12px;

            line-height: 1.5;

            color: #555;

            margin-bottom: 2mm;
        }

        /* =========================
           NOM FORMATION
        ========================= */

        .formation {
            font-family: DejaVu Serif, serif;

            font-size: 20px;

            font-weight: bold;

            color: #198754;

            margin: 2mm auto 3mm auto;

            width: 210mm;
        }

        /* =========================
           INFORMATIONS
        ========================= */

        .info-table {
            width: 180mm;

            margin: 3mm auto 4mm auto;

            border-collapse: collapse;
        }

        .info-table td {
            width: 33.33%;

            text-align: center;

            padding: 2mm 4mm;

            border-right: 1px solid #ddd;
        }

        .info-table td:last-child {
            border-right: none;
        }

        .info-label {
            font-size: 8px;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: #888;

            margin-bottom: 1mm;
        }

        .info-value {
            font-size: 11px;

            font-weight: bold;

            color: #333;
        }

        /* =========================
           SCEAU
        ========================= */

        .seal {
            width: 18mm;
            height: 18mm;

            border: 2px solid #c9a227;

            border-radius: 50%;

            margin: 1mm auto 2mm auto;

            padding-top: 5mm;

            color: #198754;

            font-size: 6px;

            font-weight: bold;

            text-align: center;
        }

        /* =========================
           DATE
        ========================= */

        .date {
            font-size: 9px;

            color: #777;

            margin-top: 1mm;
        }

        /* =========================
           PARTIE BASSE
        ========================= */

        .bottom {
            position: absolute;

            left: 25mm;
            right: 25mm;

            bottom: 16mm;

            z-index: 20;
        }

        .bottom-table {
            width: 100%;

            border-collapse: collapse;
        }

        .bottom-table td {
            text-align: center;

            vertical-align: bottom;
        }

        /* =========================
           SIGNATURES
        ========================= */

        .signature {
            width: 35%;
        }

        .signature-space {
            height: 8mm;
        }

        .signature-line {
            width: 50mm;

            height: 1px;

            background: #555;

            margin: 0 auto 2mm auto;
        }

        .signature-name {
            font-size: 9px;

            font-weight: bold;

            color: #333;
        }

        .signature-role {
            font-size: 8px;

            color: #777;

            margin-top: 1mm;
        }

        /* =========================
           NUMERO CERTIFICAT
        ========================= */

        .number {
            width: 30%;
        }

        .number-label {
            font-size: 7px;

            color: #888;

            text-transform: uppercase;

            letter-spacing: 1px;
        }

        .number-value {
            font-size: 9px;

            font-weight: bold;

            color: #198754;

            margin-top: 2mm;
        }

        /* =========================
           COINS DECORATIFS
        ========================= */

        .corner {
            position: absolute;

            width: 15mm;
            height: 15mm;

            z-index: 30;
        }

        .corner-tl {
            top: 11mm;
            left: 11mm;

            border-top: 3px solid #198754;
            border-left: 3px solid #198754;
        }

        .corner-tr {
            top: 11mm;
            right: 11mm;

            border-top: 3px solid #198754;
            border-right: 3px solid #198754;
        }

        .corner-bl {
            bottom: 11mm;
            left: 11mm;

            border-bottom: 3px solid #198754;
            border-left: 3px solid #198754;
        }

        .corner-br {
            bottom: 11mm;
            right: 11mm;

            border-bottom: 3px solid #198754;
            border-right: 3px solid #198754;
        }


        /* =========================
   QR CODE
========================= */

.qr-code {
    position: absolute;

    right: 18mm;
    bottom: 17mm;

    width: 28mm;

    text-align: center;

    z-index: 50;
}

.qr-code img {
    width: 23mm;
    height: 23mm;

    display: block;

    margin: 0 auto;
}

.qr-label {
    font-size: 7px;

    color: #777;

    margin-top: 1mm;

    line-height: 1.2;
}

.qr-number {
    font-size: 6px;

    color: #198754;

    margin-top: 1mm;

    font-weight: bold;
}

    </style>
</head>

<body>

<div class="certificate">

    <!-- =========================
         BORDURES
    ========================== -->

    <div class="outer-border"></div>

    <div class="inner-border"></div>


    <!-- =========================
         COINS
    ========================== -->

    <div class="corner corner-tl"></div>
    <div class="corner corner-tr"></div>
    <div class="corner corner-bl"></div>
    <div class="corner corner-br"></div>


    <!-- =========================
         CONTENU CENTRAL
    ========================== -->

    <div class="content">

        <div class="brand">
            SKILLORA
        </div>

        <div class="gold-line"></div>


        <div class="small-title">
            Plateforme de formation aux compétences pratiques
        </div>


        <div class="title">
            CERTIFICAT DE RÉUSSITE
        </div>


        <div class="intro">
            Ce certificat est officiellement décerné à
        </div>


        <!-- APPRENANT -->

        <div class="student-name">
            {{ $apprenant->name }}
        </div>

        <div class="student-line"></div>


        <!-- DESCRIPTION -->

        <div class="description">
            Pour avoir suivi avec succès et achevé l'ensemble des activités
            pédagogiques de la formation :
        </div>


        <!-- FORMATION -->

        <div class="formation">
            {{ $formation->titre }}
        </div>


        <div class="description">
            et avoir satisfait aux exigences de validation prévues par
            la plateforme SkillOra.
        </div>


        <!-- =========================
             INFORMATIONS
        ========================== -->

        <table class="info-table">

            <tr>

                <td>

                    <div class="info-label">
                        Formateur
                    </div>

                    <div class="info-value">

                        @if($formation->formateur && $formation->formateur->user)

                            {{ $formation->formateur->user->name }}

                        @else

                            Non renseigné

                        @endif

                    </div>

                </td>


                <td>

                    <div class="info-label">
                        Durée
                    </div>

                    <div class="info-value">
                        {{ $formation->duree }}
                    </div>

                </td>


                <td>

                    <div class="info-label">
                        Date d'obtention
                    </div>

                    <div class="info-value">
                        {{ $dateObtention->format('d/m/Y') }}
                    </div>

                </td>

            </tr>

        </table>


        <!-- =========================
             SCEAU
        ========================== -->

        <div class="seal">
            SKILLORA
        </div>


        <div class="date">

            Certificat délivré le
            {{ $dateObtention->format('d/m/Y') }}

        </div>

    </div>


    <!-- =========================
         SIGNATURES
    ========================== -->

    <div class="bottom">

        <table class="bottom-table">

            <tr>

                <!-- FORMATEUR -->

                <td class="signature">

                    <div class="signature-space"></div>

                    <div class="signature-line"></div>

                    <div class="signature-name">

                        @if($formation->formateur && $formation->formateur->user)

                            {{ $formation->formateur->user->name }}

                        @else

                            Formateur

                        @endif

                    </div>

                    <div class="signature-role">
                        Formateur
                    </div>

                </td>


                <!-- NUMERO -->

                <td class="number">

                    <div class="number-label">
                        Numéro du certificat
                    </div>

                    <div class="number-value">
                        {{ $numeroCertificat }}
                    </div>

                </td>


                <!-- ADMINISTRATION -->

                <td class="signature">

                    <div class="signature-space"></div>

                    <div class="signature-line"></div>

                    <div class="signature-name">
                        SKILLORA
                    </div>

                    <div class="signature-role">
                        Administration
                    </div>

                </td>

            </tr>

        </table>

    </div>

    {{-- =========================
     QR CODE
========================= --}}

@if(isset($qrCode))

    <div class="qr-code">

        
        <img
                src="data:image/png;base64,{{ $qrCode }}"
                alt="QR Code"
                style="width: 35mm; height: 35mm;"
            >
        <div class="qr-label">
            Scanner pour vérifier
        </div>

        <div class="qr-number">
            {{ $numeroCertificat }}
        </div>

    </div>

@endif

</div>

</body>
</html>