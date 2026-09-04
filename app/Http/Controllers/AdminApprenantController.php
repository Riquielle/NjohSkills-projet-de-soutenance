<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Inscription;

use Illuminate\Http\Request;

class AdminApprenantController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'apprenant');

        /*
        |--------------------------------------------------------------------------
        | RECHERCHE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");

            });
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $apprenants = $query
            ->latest()
            ->paginate(10);


        return view(
            'admin.apprenants.index',
            compact('apprenants')
        );
    }

     // Désactiver un apprenant
    public function desactiver($id)
    {
        $apprenant = User::where('role', 'apprenant')
            ->findOrFail($id);

        $apprenant->actif = false;
        $apprenant->save();

        return back()->with(
            'success',
            'L’apprenant a été désactivé avec succès.'
        );
    }


    // Activer un apprenant
    public function activer($id)
    {
        $apprenant = User::where('role', 'apprenant')
            ->findOrFail($id);

        $apprenant->actif = true;
        $apprenant->save();

        return back()->with(
            'success',
            'L’apprenant a été activé avec succès.'
        );
    }

   public function show($id)
{
    $apprenant = User::where('role', 'apprenant')
        ->findOrFail($id);

    $inscriptions = Inscription::with('formation')
        ->where('user_id', $apprenant->id)
        ->latest()
        ->get();

    return view(
        'admin.apprenants.show',
        compact('apprenant', 'inscriptions')
    );
}
}
