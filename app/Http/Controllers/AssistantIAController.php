<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Inscription;
use App\Models\Formation;


use Illuminate\Http\Request;

class AssistantIAController extends Controller
{
    public function assistant_ia()
    {

        $user = Auth::user();


        return view(
            'assistant_ia',
            compact('user')
        );

    }



    public function assistant_message(Request $request)
    {

        $message = $request->message;


        // Réponse temporaire
        // Plus tard on connectera l'IA


        $reponse = "Je suis votre assistant IA. 
        Votre question concerne : ".$message;


        return response()->json([

            'reponse'=>$reponse

        ]);

    }
}
