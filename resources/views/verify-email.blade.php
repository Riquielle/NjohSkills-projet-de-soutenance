<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vérification de votre adresse e-mail</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 100vh;">

    <div class="card shadow-sm border-0"
         style="max-width: 500px; width: 100%;">

        <div class="card-body p-4 text-center">

            <h3 class="mb-3">
                Vérification de votre adresse e-mail
            </h3>

            <p class="text-muted">
                Votre adresse e-mail n'est pas encore vérifiée.
                Veuillez consulter votre boîte mail et cliquer sur le
                lien de vérification que nous vous avons envoyé.
            </p>

            {{-- Message de succès --}}
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Message d'erreur --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Erreurs de validation --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <hr class="my-4">

            <h5 class="mb-3">
                Vous n'avez pas reçu l'e-mail ?
            </h5>

            <p class="text-muted small">
                Entrez votre adresse e-mail afin de recevoir
                un nouveau lien de vérification.
            </p>

            <form method="POST"
                  action="{{ route('verification.send') }}">

                @csrf

                <div class="mb-3 text-start">

                    <label for="email" class="form-label">
                        Adresse e-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Votre adresse e-mail"
                        value="{{ old('email') }}"
                        required>

                </div>

                <button type="submit"
                        class="btn btn-primary w-100">

                    Renvoyer le lien de vérification

                </button>

            </form>

            <div class="mt-4">

                <a href="{{ route('sign_in') }}">
                    Retour à la connexion
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>