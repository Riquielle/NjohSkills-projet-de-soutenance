<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {
        // Render termine HTTPS avant de transmettre la requête à l'application.
        // Faire confiance au proxy conserve le schéma HTTPS lors de la validation
        // des URL signées, notamment les liens de vérification d'e-mail.
        $middleware->trustProxies(at: '*');

        // Redirection des utilisateurs non connectés
        $middleware->redirectGuestsTo(function () {
            return route('sign_in');
        });

        // Middleware administrateur
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);

    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
