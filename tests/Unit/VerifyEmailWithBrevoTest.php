<?php

namespace Tests\Unit;

use App\Models\User;
use App\Notifications\VerifyEmailWithBrevo;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VerifyEmailWithBrevoTest extends TestCase
{
    public function test_it_sends_a_verification_message_through_brevo_api(): void
    {
        config([
            'services.brevo.key' => 'test-key',
            'services.brevo.from.address' => 'sender@example.test',
            'services.brevo.from.name' => 'SkillOra',
        ]);

        VerifyEmail::createUrlUsing(fn () => 'https://example.test/verify');
        Http::fake(['https://api.brevo.com/*' => Http::response(['messageId' => 'test-id'], 201)]);

        $user = new User([
            'name' => 'Awa',
            'email' => 'awa@example.test',
        ]);

        (new VerifyEmailWithBrevo)->toBrevo($user);

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.brevo.com/v3/smtp/email'
                && $request->hasHeader('api-key', 'test-key')
                && $request['sender']['email'] === 'sender@example.test'
                && $request['to'][0]['email'] === 'awa@example.test'
                && str_contains($request['htmlContent'], 'https://example.test/verify');
        });
    }
}
