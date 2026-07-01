<?php

namespace App\Http\Controllers;
use App\Models\Module;

use Illuminate\Http\Request;
use App\Models\Formation;


class ModuleController extends Controller
{
    /**
     * Afficher les modules d'une formation
     */
    public function module(Formation $formation)
    {
        $modules = $formation->modules()
                             ->orderBy('ordre')
                             ->get();

        return view('modules', compact(
            'formation',
            'modules'
        ));
    }

    public function store(Request $request, Formation $formation)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'objectif' => 'nullable',
            'ordre' => 'required|integer|min:1'
        ]);

        $formation->modules()->create([
            'formation_id' => $formation->id,
            'titre' => $request->titre,
            'objectif' => $request->objectif,
            'ordre' => $request->ordre,
        ]);

        return redirect()->back()->with('success', 'Module ajouté avec succès.');
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'objectif' => 'nullable',
            'ordre' => 'required|integer|min:1'
        ]);

        $module->update([
            'titre' => $request->titre,
            'objectif' => $request->objectif,
            'ordre' => $request->ordre,
        ]);

        return redirect()->back()->with('success', 'Module modifié avec succès.');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->back()->with('success', 'Module supprimé avec succès.');
    }
}
