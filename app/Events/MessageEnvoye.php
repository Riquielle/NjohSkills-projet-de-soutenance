<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\PrivateChannel;

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEnvoye implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public Message $message;

    /**
     * Créer un nouvel événement.
     */
    public function __construct(Message $message)
    {
        $this->message = $message->load('expediteur');
    }

    /**
     * Canal privé de la conversation.
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel(
                'conversation.' .
                $this->message->apprenant_id . '.' .
                $this->message->formateur_id
            ),
        ];
    }

    /**
     * Nom de l'événement reçu par JavaScript.
     */
    public function broadcastAs(): string
    {
        return 'message.envoye';
    }

    /**
     * Données envoyées au navigateur.
     */
    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'message' => $this->message->message,
            'expediteur_id' => $this->message->expediteur_id,
            'apprenant_id' => $this->message->apprenant_id,
            'formateur_id' => $this->message->formateur_id,
            'lu' => $this->message->lu,
            'created_at' => $this->message->created_at->format('Y-m-d H:i:s'),

            'expediteur' => [
                'id' => $this->message->expediteur->id,
                'name' => $this->message->expediteur->name,
            ],
        ];
    }
}