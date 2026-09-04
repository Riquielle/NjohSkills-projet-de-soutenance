<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminParametreController extends Controller
{
    public function index()
    {
        return view('admin.parametres.index');
    }


    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return back()->with(
            'success',
            'Vos informations ont été mises à jour avec succès.'
        );
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],

            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
        ]);

        $user = Auth::user();

        if (!Hash::check(
            $request->current_password,
            $user->password
        )) {

            return back()->withErrors([
                'current_password' =>
                    'Le mot de passe actuel est incorrect.'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with(
            'success',
            'Votre mot de passe a été modifié avec succès.'
        );
    }


    public function updateNotifications(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'notifications_active' => $request->boolean('notifications'),
        ]);

        return back()->with(
            'success',
            $user->notifications_active
                ? 'Les notifications ont été activées.'
                : 'Les notifications ont été désactivées.'
        );
    }
}