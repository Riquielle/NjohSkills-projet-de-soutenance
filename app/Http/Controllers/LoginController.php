<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function sign_in()
    {
        return view('Accueil.sign_in');
    }


    //cette methode permet d'authentifier les utilisateurs
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

            if(Auth::attempt(['email'=> $request->email,'password' => $request->password])){

                            // 🔥 AJOUT MINIMUM ICI
                $user = Auth::user();

                 // Vérification du statut du compte
                if (!$user->actif) {

                    Auth::logout();

                    return redirect()
                        ->route('sign_in')
                        ->with(
                            'error',
                            'Votre compte a été désactivé par l’administrateur.'
                        );
                }

                if ($user->role == 'apprenant') {
                    return redirect()->route('dashboard_ap');
                }

                if ($user->role == 'formateur') {
                    return redirect()->route('dashboard_fo');
                }

             // ADMINISTRATEUR
                if ($user->role == 'admin') {

                    return redirect()->route('admin.dashboard');
                }


                // Si le rôle n'est pas reconnu
                Auth::logout();

                return redirect()->route('sign_in')
                    ->with('error', 'Votre rôle utilisateur est invalide.');


            } else {
                return redirect()->route('sign_in')->with('error', 'Email ou mot de passe incorrect.');
            }

        }else{
            return redirect()->route('sign_in')
                ->withInput()
                ->withErrors($validator);
        }
    }



    public function sign_upApprenant()
    {

        return view('Accueil.sign_up.apprenant');
    }

    public function sign_upFormateur()
    {
        return view('Accueil.sign_up.formateur');
    }


    public function processsign_upApprenant(Request $request){
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);

            if($validator->passes()){

               $user = new User();
               $user->name = $request->name;
               $user->email = $request->email;
               $user->password = Hash::make($request->password);
               $user->role = 'apprenant';
               $user->save();

               return redirect()->route('sign_in')->with('success','Inscription réussie ! Connectez-vous.');

            }else{
                return redirect()->route('sign_up.apprenant')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error', 'Inscription échouée, veuillez vérifier vos informations.');
            }  
    }
        

    public function processsign_upFormateur(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'telephone' => 'required',
            'specialite' => 'required',
            'experience' => 'required',
            'biographie' => 'required',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'formateur';
            $user->save();

            // 🔥 insertion des infos formateur dans la table formateurs
            $formateur = new Formateur();
            $formateur->user_id = $user->id;
            $formateur->telephone = $request->telephone;
            $formateur->specialite = $request->specialite;
            $formateur->experience = $request->experience;
            $formateur->biographie = $request->biographie;
            $formateur->save();

            return redirect()->route('sign_in')
                ->with('success', 'Inscription réussie ! Connectez-vous.');

        } else {
            return redirect()->route('sign_up.formateur')
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Inscription échouée, veuillez vérifier vos informations.');
        }
    }
        
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('sign_in');
    }
    
    
}
