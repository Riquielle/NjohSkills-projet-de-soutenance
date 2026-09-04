<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscription;
use App\Models\Formation;
use App\Models\QuizTentative;


use Illuminate\Support\Facades\Auth;

class DashboardfoController extends Controller
{
    public function dashboard_fo()
    {


        $user = Auth::user();

        


        $formateur = $user->formateur;



        // Formations du formateur

        $formations = $formateur
            ->formations()
            ->withCount('inscriptions')
            ->get();



        // Nombre de formations

        $formationsTotal = $formations->count();




        // Nombre d'apprenants

        $apprenantsTotal = Inscription::whereIn(
            'formation_id',
            $formations->pluck('id')
        )->count();




        // Revenus

        $revenus = $formations->sum(function($formation){

            return $formation->prix *
                $formation->inscriptions_count;

        });




        return view(
            'dashboard_fo',
            compact(
                'user',
                'formateur',
                'formations',
                'formationsTotal',
                'apprenantsTotal',
                'revenus',
                
            )
        );
    }


    

    /**
     * Lire une notification
     */
    public function lireNotification($id)
    {
        $notification = Auth::user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        // Si la notification concerne une formation
        if (isset($notification->data['formation_id'])) {

            return redirect()->route('Mes_formations');
        }

        return back();
    }

    public function mes_apprenants()
    {


        $user = Auth::user();


        $formateur = $user->formateur;



        // récupérer les formations du formateur

        $formations = $formateur
            ->formations()
            ->pluck('id');




        // récupérer les apprenants inscrits

        $inscriptions = Inscription::whereIn(
            'formation_id',
            $formations
            )
            ->with('user','formation')
            ->latest()
            ->paginate(10);



        return view(
            'mes_apprenants',
            compact(
                'inscriptions',
                'user',
                'formateur'
            )
        );


    }

    public function voir_ap(Inscription $inscription)
    {

        $formation = $inscription->formation;

        $user = $inscription->user;
        $formateur = Auth::user()->formateur;

        $formations = $formateur->formations()->pluck('id');

        $liste = Inscription::whereIn('formation_id', $formations)
            ->orderBy('id')
            ->pluck('id')
            ->values();

        $position = $liste->search($inscription->id);

        $precedent = $position > 0
            ? $liste[$position - 1]
            : null;

        $suivant = $position < $liste->count() - 1
            ? $liste[$position + 1]
            : null;

        $modules = $formation->modules()
            ->with([
                'lecons.ressources.progressions',
                'quiz'
            ])
            ->orderBy('ordre')
            ->get();

        $quizTentatives = QuizTentative::where(
                'user_id',
                $user->id
            )
            ->whereIn(
                'quiz_id',
                $modules->pluck('quiz.id')->filter()
            )
            ->get()
            ->keyBy('quiz_id');

        foreach ($modules as $module) {

            $totalRessources = 0;
            $ressourcesTerminees = 0;

            foreach ($module->lecons as $lecon) {

                foreach ($lecon->ressources as $ressource) {

                    $totalRessources++;

                    if (
                        $ressource->progressions
                            ->where('user_id', $user->id)
                            ->where('terminee', true)
                            ->count()
                    ) {

                        $ressourcesTerminees++;

                    }

                }

            }

            $module->totalRessources = $totalRessources;

            $module->ressourcesTerminees = $ressourcesTerminees;

            $module->progression =

                $totalRessources == 0

                ? 0

                : round(($ressourcesTerminees/$totalRessources)*100);

        }

        return view(
            'voir_ap',
            compact(
                'inscription',
                'formation',
                'user',
                'modules',
                'quizTentatives',
                'precedent',
                'suivant',
                'formateur'
                
        
        
            )
        );

    }

}
