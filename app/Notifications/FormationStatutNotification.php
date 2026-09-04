<?php

namespace App\Notifications;

use App\Models\Formation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormationStatutNotification extends Notification
{
    use Queueable;

    protected $formation;
    protected $action;

    /**
     * Create a new notification instance.
     */
    public function __construct(Formation $formation, $action)
    {
        $this->formation = $formation;
        $this->action = $action;
    }

    /**
     * Canaux utilisés
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Notification enregistrée en base de données
     */
    public function toArray(object $notifiable): array
    {
        if ($this->action === 'publie') {

            return [
                'type' => 'formation_publiee',

                'formation_id' => $this->formation->id,

                'formation_titre' => $this->formation->titre,

                'message' =>
                    'Votre formation « ' .
                    $this->formation->titre .
                    ' » a été publiée par l’administrateur.',

                'icon' => 'fas fa-check-circle',

                'statut' => 'success',
            ];
        }

        return [
            'type' => 'formation_depubliee',

            'formation_id' => $this->formation->id,

            'formation_titre' => $this->formation->titre,

            'message' =>
                'Votre formation « ' .
                $this->formation->titre .
                ' » a été retirée de la publication par l’administrateur.',

            'icon' => 'fas fa-exclamation-triangle',

            'statut' => 'warning',
        ];
    }
}