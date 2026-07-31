<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\QuizTentative;

class DashboardApprenantController extends Controller
{
    public function dashboardapprenant()
    {
        $user = Auth::user();

        $formations = $user->formations()
            ->with('formateur.user')
            ->get();

        $inscriptions = Inscription::with([
            'formation.formateur.user'
        ])
        ->where('user_id', $user->id)
        ->get();

        $formationsTotal = $inscriptions->count();

        $formationsTerminees = $inscriptions
            ->where('progression', 100)
            ->count();

        $formationsEnCours = $inscriptions
            ->where('progression', '<', 100)
            ->count();

        $progressionMoyenne = $formationsTotal > 0
            ? round($inscriptions->avg('progression'))
            : 0;

        return view(
            'dashboardapprenant',
            compact(
                'user',
                'inscriptions',
                'formationsTotal',
                'formationsEnCours',
                'formationsTerminees',
                'progressionMoyenne',
                'formations'
            )
        );
    }

    public function mesa_Formations()
    {
        $user = Auth::user();


        $formations = $user->formations()
            ->with('formateur.user')
            ->get();


        return view(
            'mesa_formations',
            compact('formations')
        );
    }

    public function ma_progression()
    {
        $user = Auth::user();


        $formations = $user->formations()
            ->with([
                'modules.quiz'
            ])
            ->get();



        foreach($formations as $formation){


            $modulesTotal = $formation->modules->count();


            $modulesValides = 0;



            foreach($formation->modules as $module){


                if($module->quiz){


                    $valide = QuizTentative::where('user_id',$user->id)

                        ->where('quiz_id',$module->quiz->id)

                        ->where('reussi',true)

                        ->exists();



                    if($valide){

                        $modulesValides++;

                    }

                }

            }



            $formation->modulesTotal = $modulesTotal;

            $formation->modulesValides = $modulesValides;



        }



        return view(
            'ma_progression',
            compact('formations')
        );
    }


    public function mes_certificats()
    {
        $user = Auth::user();


        $formations = $user->formations()
            ->with('formateur.user')
            ->wherePivot('progression',100)
            ->get();



        return view(
            'mes_certificats',
            compact('formations')
        );
    }
}
