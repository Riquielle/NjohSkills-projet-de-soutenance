<?php

namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Lecon;


use Illuminate\Http\Request;

class LeconController extends Controller
{
    public function index(Module $module)
    {
        $lecons = $module->lecons()
                         ->orderBy('ordre')
                         ->get();

        return view(
            'lecons',
            compact('module','lecons')
        );
    }

    public function store(Request $request, Module $module)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ordre' => 'required|integer|min:1',
        ]);

        $module->lecons()->create([
            'module_id' => $module->id,
            'titre' => $request->titre,
            'description' => $request->description,
            'ordre' => $request->ordre,
        ]);

        return redirect()
                ->back()
                ->with('success', 'Leçon ajoutée avec succès.');
    }

    public function update(Request $request, Lecon $lecon)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ordre' => 'required|integer|min:1',
        ]);

        $lecon->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'ordre' => $request->ordre,
        ]);

        return redirect()
                ->back()
                ->with('success', 'Leçon modifiée avec succès.');
    }
    public function destroy(Lecon $lecon)
    {
        $lecon->delete();

        return redirect()
                ->back()
                ->with('success', 'Leçon supprimée avec succès.');
    }
}
