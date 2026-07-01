<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardfoController extends Controller
{
    public function dashboard_fo()
    {
        $user = Auth::user();
        $formateur = $user->formateur;

        return view('dashboard_fo', compact('user', 'formateur'));
    }
}
