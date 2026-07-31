<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecon;
use App\Models\Ressource;

use Illuminate\Support\Facades\Storage;

class RessourceController extends Controller
{
    public function ressources(Lecon $lecon)
    {
        $ressources = $lecon->ressources()
                            ->latest()
                            ->get();

        return view(
            'ressources',
            compact('lecon', 'ressources')
        );
    }

    public function store(Request $request, Lecon $lecon)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'fichier' => 'required|file|max:51200|mimes:pdf,mp4,avi,mov,mkv,webm,mp3,wav,ogg,aac,jpg,jpeg,png,gif,webp,zip,rar'
        ]);

        $path = $request->file('fichier')
                        ->store('ressources', 'public');

        $extension = strtolower(
            $request->file('fichier')->getClientOriginalExtension()
        );

        $type = match ($extension) {

            // Vidéos
            'mp4', 'avi', 'mov', 'mkv', 'webm' => 'video',

            // Audios
            'mp3', 'wav', 'ogg', 'aac' => 'audio',

            // PDF
            'pdf' => 'pdf',

            // Images
            'jpg', 'jpeg', 'png', 'gif', 'webp' => 'image',


            // Archives
            'zip', 'rar', '7z' => 'zip',

            default => 'autre',
        };

        $lecon->ressources()->create([

            'nom' => $request->nom,

            'type' => $type,

            'fichier' => $path,

        ]);

        $formation->verifierPublication();
        return redirect()
                ->back()
                ->with('success', 'Ressource ajoutée avec succès.');
    }
    public function update(Request $request, Ressource $ressource)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'fichier' => 'required|file|max:51200|mimes:pdf,mp4,avi,mov,mkv,webm,mp3,wav,ogg,aac,jpg,jpeg,png,gif,webp,zip,rar'
        ]);

        $data = [

            'nom' => $request->nom

        ];

        if ($request->hasFile('fichier')) {

            if ($ressource->fichier &&
                Storage::disk('public')->exists($ressource->fichier)) {

                Storage::disk('public')->delete($ressource->fichier);
            }

            $path = $request->file('fichier')
                            ->store('ressources', 'public');

            $extension = strtolower(
                $request->file('fichier')->getClientOriginalExtension()
            );

            $type = match ($extension) {

                'mp4', 'avi', 'mov', 'mkv', 'webm' => 'video',

                'mp3', 'wav', 'ogg', 'aac' => 'audio',

                'pdf' => 'pdf',

                'jpg', 'jpeg', 'png', 'gif', 'webp' => 'image',


                'zip', 'rar', '7z' => 'zip',

                default => 'autre',
            };

            $data['fichier'] = $path;
            $data['type'] = $type;
        }

        $ressource->update($data);

        return redirect()
                ->back()
                ->with('success', 'Ressource modifiée avec succès.');
    }

    public function destroy(Ressource $ressource)
    {
        if ($ressource->fichier &&
            Storage::disk('public')->exists($ressource->fichier)) {

            Storage::disk('public')->delete($ressource->fichier);
        }

        $ressource->delete();

        return redirect()
                ->back()
                ->with('success', 'Ressource supprimée avec succès.');
    }
}
