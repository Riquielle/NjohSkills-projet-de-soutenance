<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Formateur;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function A_formation()
    {
        return view('A_formation');
    }


    public function Mes_formations()
    {
        $formateur = auth()->user()->formateur;

        if (!$formateur) {
            return redirect()->back()->with('error', 'Profil formateur introuvable');
        }

        $formations = $formateur->formations()->latest()->get();

        return view('Mes_formations', compact('formations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'titre_apercu' => 'required|string',
            'apercu' => 'required|string',
            'prix' => 'required|numeric',
            'duree' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $formateur = Formateur::where('user_id', Auth::id())->first();

        if (!$formateur) {
            return redirect()->back()->with('error', 'Formateur introuvable');
        }

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                ->store('formations', 'public');
        }

        Formation::create([
            'formateur_id' => $formateur->id,
            'titre' => $request->titre,
            'description' => $request->description,
            'titre_apercu' => $request->titre_apercu,
            'apercu'=> $request->apercu,
            'prix' => $request->prix,
            'duree' => $request->duree,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success','Formation ajoutée avec succès');
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'titre_apercu' => 'required|string',
            'apercu' => 'required|string', // Validation du champ
            'prix' => 'required',
            'duree' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $formation = Formation::findOrFail($id);

        $data = [
            'titre' => $request->titre,
            'description' => $request->description,
            'titre_apercu' => $request->titre_apercu,
            'apercu'=> $request->apercu,
            'prix' => $request->prix,
            'duree' => $request->duree,
        ];

        if ($request->hasFile('image')) {

            // supprimer ancienne image
            if ($formation->image) {
                Storage::disk('public')->delete($formation->image);
            }

            // nouvelle image
            $data['image'] = $request->file('image')
                ->store('formations', 'public');
        }

        $formation->update($data);

        return redirect()->back()->with('success', 'Formation mise à jour');
    }

    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);

        // SUPPRESSION DE L'IMAGE SI ELLE EXISTE
        if ($formation->image) {
            Storage::disk('public')->delete($formation->image);
        }

        // SUPPRESSION EN BASE
        $formation->delete();

        return redirect()
            ->back()
            ->with('success', 'Formation supprimée avec succès');
    }
    
}
