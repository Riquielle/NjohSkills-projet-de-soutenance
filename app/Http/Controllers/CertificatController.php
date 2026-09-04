<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class CertificatController extends Controller
{
    /**
     * Télécharger le certificat de l'apprenant
     */
    public function telecharger($formationId)
    {
        // Récupérer la formation avec son formateur
        $formation = Formation::with('formateur.user')
            ->findOrFail($formationId);

        // Récupérer l'inscription de l'apprenant connecté
        $inscription = Inscription::with('apprenant')
            ->where('formation_id', $formationId)
            ->where('user_id', Auth::id())
            ->where('statut', 'valide')
            ->first();

        // Vérifier l'inscription
        if (!$inscription) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Vous devez être inscrit à cette formation.'
                );
        }

        // Vérifier que la formation est terminée
        if ($inscription->progression < 100) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Vous devez terminer la formation avant de télécharger votre certificat.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Numéro du certificat
        |--------------------------------------------------------------------------
        */

        $numeroCertificat = 'SKILLORA-' .
            now()->format('Y') . '-' .
            str_pad(
                $inscription->id,
                6,
                '0',
                STR_PAD_LEFT
            );

        /*
        |--------------------------------------------------------------------------
        | URL publique de vérification
        |--------------------------------------------------------------------------
        */

        $verificationUrl = url(
            '/certificat/verifier/' . $numeroCertificat
        );

        /*
        |--------------------------------------------------------------------------
        | Génération du QR Code
        |--------------------------------------------------------------------------
        */

        $qrCodeResult = (new Builder(
            writer: new PngWriter(),
            data: $verificationUrl,
            size: 150,
            margin: 5
        ))->build();

        /*
        |--------------------------------------------------------------------------
        | Conversion du QR Code en Base64
        |--------------------------------------------------------------------------
        */

        $qrCode = base64_encode(
            $qrCodeResult->getString()
        );

        /*
        |--------------------------------------------------------------------------
        | Génération du PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView('certificat', [
            'formation' => $formation,
            'inscription' => $inscription,
            'apprenant' => $inscription->apprenant,
            'numeroCertificat' => $numeroCertificat,
            'dateObtention' => now(),
            'qrCode' => $qrCode,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Format A4 paysage
        |--------------------------------------------------------------------------
        */

        $pdf->setPaper('A4', 'landscape');

        /*
        |--------------------------------------------------------------------------
        | Télécharger le certificat
        |--------------------------------------------------------------------------
        */

        return $pdf->download(
            'certificat-skillora-' . $formation->id . '.pdf'
        );
    }


    /**
     * Vérifier l'authenticité d'un certificat
     */
    public function verifier($numeroCertificat)
    {
        /*
        |--------------------------------------------------------------------------
        | Vérifier le format du numéro
        |--------------------------------------------------------------------------
        |
        | Exemple :
        | SKILLORA-2026-000001
        |
        */

        if (!preg_match(
            '/^SKILLORA-\d{4}-\d{6}$/',
            $numeroCertificat
        )) {
            return view('verification', [
                'valide' => false,
                'numeroCertificat' => $numeroCertificat,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Récupérer l'identifiant de l'inscription
        |--------------------------------------------------------------------------
        */

        $parties = explode(
            '-',
            $numeroCertificat
        );

        $inscriptionId = (int) $parties[2];

        /*
        |--------------------------------------------------------------------------
        | Rechercher l'inscription
        |--------------------------------------------------------------------------
        */

        $inscription = Inscription::with([
            'apprenant',
            'formation.formateur.user'
        ])->find($inscriptionId);

        /*
        |--------------------------------------------------------------------------
        | Vérifier le certificat
        |--------------------------------------------------------------------------
        */

        if (
            !$inscription ||
            $inscription->statut !== 'valide' ||
            $inscription->progression < 100
        ) {
            return view('verification', [
                'valide' => false,
                'numeroCertificat' => $numeroCertificat,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Certificat valide
        |--------------------------------------------------------------------------
        */

        return view('verification', [
            'valide' => true,
            'numeroCertificat' => $numeroCertificat,
            'inscription' => $inscription,
            'apprenant' => $inscription->apprenant,
            'formation' => $inscription->formation,
            'dateObtention' => $inscription->updated_at,
        ]);
    }
}