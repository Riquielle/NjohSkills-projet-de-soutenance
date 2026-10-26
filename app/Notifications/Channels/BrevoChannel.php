<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use LogicException;

class BrevoChannel
{
    public function send(object $notifiable, Notification $notification): void
    {
        if (! method_exists($notification, 'toBrevo')) {
            throw new LogicException('La notification ne fournit pas de message Brevo.');
        }

        $notification->toBrevo($notifiable);
    }
}
