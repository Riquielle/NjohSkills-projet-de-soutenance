<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inscription;
use App\Models\Formateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
{
    public function profil()
    {
        $user = Auth::user();

        return view('profil', compact('user'));
    }

   public function profil_formateur()
    {
        $user = Auth::user();
        $formateur = $user->formateur;

        return view('profil_formateur', compact('user','formateur'));
    }


    public function profil_update(Request $request)
    {

        $user = Auth::user();


        $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'date_naissance' => 'nullable|date',

            'sexe' => 'nullable|in:Homme,Femme',

            'adresse' => 'nullable|string|max:255',

            'ville' => 'nullable|string|max:255',

            'pays' => 'nullable|string|max:255',

            'bio' => 'nullable|string',

        ]);


        if($request->hasFile('photo')){


            // supprimer ancienne photo si elle existe
            if($user->photo && Storage::disk('public')->exists($user->photo)){

                Storage::disk('public')->delete($user->photo);

            }


            // enregistrer nouvelle photo

            $photo = $request->file('photo')
                            ->store('profils','public');


            $user->photo = $photo;

        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_naissance = $request->date_naissance;
        $user->sexe = $request->sexe;
        $user->adresse = $request->adresse;
        $user->ville = $request->ville;
        $user->pays = $request->pays;
        $user->bio = $request->bio;


        $user->save();


        return back()->with(
            'success',
            'Profil mis à jour avec succès'
        );

    }

    public function supprimer_photo()
    {

        $user = Auth::user();


        if($user->photo){

            if(Storage::disk('public')->exists($user->photo)){

                Storage::disk('public')->delete($user->photo);

            }


            $user->photo = null;

            $user->save();

        }


        return back()->with(
            'success',
            'Photo supprimée avec succès'
        );

    }


    public function changer_password(Request $request)
    {

        $user = Auth::user();


        $request->validate([

            'ancien_password'=>'required',

            'nouveau_password'=>'required|min:8',

            'confirmation_password'=>'required|same:nouveau_password'

        ]);



        // Vérifier ancien mot de passe

        if(!Hash::check($request->ancien_password, $user->password)){


            return back()->with(
                'error',
                'Ancien mot de passe incorrect'
            );

        }



        // Nouveau mot de passe

        $user->password = Hash::make(
            $request->nouveau_password
        );


        $user->save();



        return back()->with(
            'success',
            'Mot de passe modifié avec succès'
        );

    }

    public function profil_formateur_update(Request $request)
    {

        $user = Auth::user();

        $formateur = $user->formateur;


        $request->validate([

            'name'=>'required',
            'email'=>'required|email',

            'telephone'=>'required',
           

        ]);



        if($request->hasFile('photo')){


            $photo = $request->file('photo')
                    ->store('profils','public');


            $user->photo = $photo;

        }



        // table users

        $user->name = $request->name;

        $user->email = $request->email;

        $user->ville = $request->ville;

        $user->pays = $request->pays;



        $user->save();




        // table formateurs

        $formateur = $user->formateur;


        $formateur->telephone = $request->telephone;

        

        $formateur->experience = $request->experience;

        $formateur->biographie = $request->biographie;


        $formateur->save();



        return back()->with(
            'success',
            'Profil formateur mis à jour avec succès'
        );


    }

    public function supprimer_photo_formateur()
    {
        $user = Auth::user();


        if($user->photo){

            // supprimer le fichier du stockage
            Storage::disk('public')->delete($user->photo);


            // vider le champ photo
            $user->photo = null;

            $user->save();

        }


        return back()->with(
            'success',
            'Photo supprimée avec succès'
        );

    }

    public function modifier_password_formateur(Request $request)
    {

        $request->validate([

            'ancien_password'=>'required',

            'nouveau_password'=>'required|min:8|confirmed'

        ]);



        $user = Auth::user();



        if(!Hash::check(
            $request->ancien_password,
            $user->password
        )){


            return back()->with(
                'error',
                'Ancien mot de passe incorrect'
            );

        }



        $user->password = Hash::make(
            $request->nouveau_password
        );


        $user->save();



        return back()->with(
            'success',
            'Mot de passe modifié avec succès'
        );

    }
}
