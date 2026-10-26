<?php

namespace App\Notifications;

use App\Notifications\Channels\BrevoChannel;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class VerifyEmailWithBrevo extends VerifyEmail
{
    public function via($notifiable): array
    {
        return [BrevoChannel::class];
    }

    public function toBrevo($notifiable): void
    {
        $apiKey = config('services.brevo.key');
        $fromAddress = config('services.brevo.from.address');

        if (blank($apiKey) || blank($fromAddress)) {
            throw new RuntimeException('La configuration Brevo est incomplète.');
        }

        $url = $this->verificationUrl($notifiable);
        $appName = config('app.name', 'SkillOra');

        $response = Http::acceptJson()
            ->withHeaders(['api-key' => $apiKey])
            ->post('https://api.brevo.com/v3/smtp/email', [
                'sender' => [
                    'email' => $fromAddress,
                    'name' => config('services.brevo.from.name', $appName),
                ],
                'to' => [[
                    'email' => $notifiable->getEmailForVerification(),
                    'name' => $notifiable->name,
                ]],
                'subject' => 'Vérifiez votre adresse e-mail - '.$appName,
                'htmlContent' => $this->htmlContent($notifiable->name, $appName, $url),
            ]);

        $response->throw();
    }

    private function htmlContent(string $name, string $appName, string $url): string
    {
        $name = e($name);
        $appName = e($appName);
        $url = e($url);

        return <<<HTML
            <p>Bonjour {$name},</p>
            <p>Merci de vous être inscrit sur {$appName}.</p>
            <p><a href="{$url}">Vérifier mon adresse e-mail</a></p>
            <p>Ce lien expire dans 60 minutes. Si vous n'êtes pas à l'origine de cette inscription, ignorez cet e-mail.</p>
        HTML;
    }
}
