<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Forcer HTTPS hors du mode local
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

        // Personnaliser le lien de vérification d'e-mail
        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1(
                        $notifiable->getEmailForVerification()
                    ),
                ]
            );
        });


        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Vérifiez votre adresse e-mail - SkillOra')
                ->greeting('Bonjour ' . $notifiable->name . ',')
                ->line('Merci de vous être inscrit sur SkillOra.')
                ->line('Pour activer votre compte, veuillez confirmer votre adresse e-mail en cliquant sur le bouton ci-dessous.')
                ->action('Vérifier mon adresse e-mail', $url)
                ->line('Si vous n\'êtes pas à l\'origine de cette inscription, vous pouvez ignorer cet e-mail.')
                ->line('Cordialement,')
                ->line('L’équipe SkillOra');
        });

        Paginator::useBootstrapFive();
    }
}