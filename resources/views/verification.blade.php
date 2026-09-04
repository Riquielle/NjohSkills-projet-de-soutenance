<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Vérification du certificat - SkillOra</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px;
        }

        .verification-card {

            width: 100%;
            max-width: 700px;

            background: white;

            border-radius: 15px;

            padding: 40px;

            text-align: center;

            box-shadow: 0 10px 30px rgba(0,0,0,0.10);
        }

        .logo {

            font-size: 30px;

            font-weight: bold;

            letter-spacing: 4px;

            color: #198754;

            margin-bottom: 25px;
        }

        .icon {

            width: 80px;
            height: 80px;

            border-radius: 50%;

            margin: 0 auto 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 40px;
        }

        .valid {

            background: #d1e7dd;

            color: #198754;
        }

        .invalid {

            background: #f8d7da;

            color: #dc3545;
        }

        h1 {

            font-size: 28px;

            margin-bottom: 15px;

            color: #333;
        }

        .message {

            color: #666;

            margin-bottom: 30px;

            line-height: 1.6;
        }

        .certificate-info {

            text-align: left;

            border: 1px solid #e5e5e5;

            border-radius: 10px;

            overflow: hidden;

            margin-top: 25px;
        }

        .info-row {

            display: flex;

            padding: 15px 20px;

            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {

            border-bottom: none;
        }

        .info-label {

            width: 40%;

            font-weight: bold;

            color: #777;
        }

        .info-value {

            width: 60%;

            color: #333;
        }

        .certificate-number {

            display: inline-block;

            background: #eaf6ef;

            color: #198754;

            padding: 10px 18px;

            border-radius: 8px;

            font-weight: bold;

            margin-top: 15px;
        }

        .footer {

            margin-top: 30px;

            font-size: 13px;

            color: #888;
        }

        @media(max-width: 600px) {

            .verification-card {
                padding: 25px 20px;
            }

            .info-row {
                display: block;
            }

            .info-label,
            .info-value {
                width: 100%;
            }

            .info-label {
                margin-bottom: 5px;
            }

            h1 {
                font-size: 23px;
            }
        }

    </style>

</head>

<body>

<div class="verification-card">

    <div class="logo">
        SKILLORA
    </div>

    @if($valide)

        <div class="icon valid">
            ✓
        </div>

        <h1>
            Certificat valide
        </h1>

        <p class="message">
            Ce certificat a été vérifié avec succès.
            Les informations présentées correspondent
            aux données enregistrées sur la plateforme SkillOra.
        </p>

        <div class="certificate-info">

            <div class="info-row">

                <div class="info-label">
                    Apprenant
                </div>

                <div class="info-value">
                    {{ $apprenant->name }}
                </div>

            </div>

            <div class="info-row">

                <div class="info-label">
                    Formation
                </div>

                <div class="info-value">
                    {{ $formation->titre }}
                </div>

            </div>

            <div class="info-row">

                <div class="info-label">
                    Formateur
                </div>

                <div class="info-value">

                    @if($formation->formateur &&
                        $formation->formateur->user)

                        {{ $formation->formateur->user->name }}

                    @else

                        Non renseigné

                    @endif

                </div>

            </div>

            <div class="info-row">

                <div class="info-label">
                    Date d'obtention
                </div>

                <div class="info-value">

                    {{ $dateObtention->format('d/m/Y') }}

                </div>

            </div>

            <div class="info-row">

                <div class="info-label">
                    Progression
                </div>

                <div class="info-value">

                    {{ $inscription->progression }} %

                </div>

            </div>

        </div>

        <div class="certificate-number">

            {{ $numeroCertificat }}

        </div>

    @else

        <div class="icon invalid">
            ✕
        </div>

        <h1>
            Certificat invalide
        </h1>

        <p class="message">

            Nous n'avons trouvé aucun certificat valide
            correspondant au numéro fourni.

        </p>

        <div class="certificate-number">

            {{ $numeroCertificat }}

        </div>

    @endif

    <div class="footer">

        Vérification officielle — SkillOra<br>

        Plateforme de formation aux compétences pratiques

    </div>

</div>

</body>

</html>