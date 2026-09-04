<?php

namespace App\Http\Controllers;
use App\Models\Formateur;
use Illuminate\Http\Request;

class AdminFormateurController extends Controller
{
    public function index(Request $request)
    {
        $query = Formateur::with('user', 'formations');

        // Recherche
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('specialite', 'like', "%{$search}%")
                  ->orWhere('telephone', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($userQuery) use ($search) {

                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");

                  });

            });
        }

        $formateurs = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.formateurs.index',
            compact('formateurs')
        );
    }


    

    public function show($id)
    {
        $formateur = Formateur::with([
            'user',
            'formations.inscriptions.user'
        ])->findOrFail($id);

        return view(
            'admin.formateurs.show',
            compact('formateur')
        );
    }

      


    public function toggleStatus($id)
    {
        $formateur = Formateur::with('user')->findOrFail($id);

        $user = $formateur->user;

        $user->actif = !$user->actif;

        $user->save();

        if ($user->actif) {

            return back()->with(
                'success',
                'Le formateur a été activé avec succès.'
            );

        }

        return back()->with(
            'success',
            'Le formateur a été désactivé avec succès.'
        );
    }
}
