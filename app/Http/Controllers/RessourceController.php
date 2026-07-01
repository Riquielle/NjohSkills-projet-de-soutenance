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
            'type' => 'required|in:video,pdf,audio,document,image,zip',
            'fichier' => 'required|file|max:51200' // 50 Mo
        ]);

        $path = null;

        if ($request->hasFile('fichier')) {

            $path = $request->file('fichier')
                            ->store('ressources', 'public');
        }

        $lecon->ressources()->create([

            'nom' => $request->nom,

            'type' => $request->type,

            'fichier' => $path

        ]);

        return redirect()
                ->back()
                ->with('success', 'Ressource ajoutée avec succès.');
    }

    public function update(Request $request, Ressource $ressource)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:video,pdf,audio,document,image,zip',
            'fichier' => 'nullable|file|max:51200'
        ]);

        $data = [

            'nom' => $request->nom,

            'type' => $request->type

        ];

        if ($request->hasFile('fichier')) {

            if ($ressource->fichier &&
                Storage::disk('public')->exists($ressource->fichier)) {

                Storage::disk('public')->delete($ressource->fichier);
            }

            $data['fichier'] = $request
                ->file('fichier')
                ->store('ressources', 'public');
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
