<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\RessourceProgression;
use App\Models\Inscription;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RessourceProgressionController extends Controller
{
    public function terminer(Request $request, Ressource $ressource)
    {
        $user = Auth::user();

        RessourceProgression::updateOrCreate(

            [
                'user_id' => $user->id,
                'ressource_id' => $ressource->id
            ],

            [
                'terminee' => true,
                'date_fin' => now()
            ]

        );

        // recalculer la progression
       RessourceProgression::updateOrCreate(

            [
                'user_id'=>$user->id,
                'ressource_id'=>$ressource->id
            ],

            [
                'terminee'=>true,
                'date_fin'=>now()
            ]

        );

        if ($request->expectsJson()) {

            return response()->json([
                'success' => true
            ]);

        }

        return redirect()->back()->with(
            'success',
            'Ressource terminée.'
        );
    }

    
}
