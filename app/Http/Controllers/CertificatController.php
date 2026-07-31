<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CertificatController extends Controller
{
    public function certificat(Formation $formation)
    {
        $inscription = Inscription::where(
                'formation_id',
                $formation->id
            )
            ->where(
                'user_id',
                Auth::id()
            )
            ->firstOrFail();

        if ($inscription->progression < 100) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Vous devez terminer toute la formation avant d’obtenir le certificat.'
                );

        }

        return view(
            'certificat',
            compact(
                'formation',
                'inscription'
            )
        );
    }
}
