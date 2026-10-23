<?php

use App\Models\User;
use App\Models\Formateur;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel(
    'conversation.{apprenantId}.{formateurId}',
    function ($user, $apprenantId, $formateurId) {

        /*
        |--------------------------------------------------------------------------
        | APPRENANT
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'apprenant') {

            // L'apprenant doit être celui de la conversation
            if ($user->id != $apprenantId) {
                return false;
            }

            // Vérifier que le formateur existe
            $formateur = Formateur::find($formateurId);

            if (!$formateur) {
                return false;
            }

            // Vérifier que l'apprenant est inscrit
            // à une formation de ce formateur
            return $user->inscriptions()
                ->whereHas('formation', function ($query) use ($formateurId) {
                    $query->where('formateur_id', $formateurId);
                })
                ->exists();
        }

        /*
        |--------------------------------------------------------------------------
        | FORMATEUR
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'formateur') {

            $formateur = $user->formateur;

            if (!$formateur) {
                return false;
            }

            // Le formateur doit correspondre
            // au formateur de la conversation
            if ($formateur->id != $formateurId) {
                return false;
            }

            // Vérifier que l'apprenant existe
            // et possède le rôle apprenant
            return User::where('id', $apprenantId)
                ->where('role', 'apprenant')
                ->whereHas('inscriptions.formation', function ($query) use ($formateur) {
                    $query->where('formateur_id', $formateur->id);
                })
                ->exists();
        }

        return false;
    }
);