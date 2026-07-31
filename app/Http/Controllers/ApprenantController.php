<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\QuizTentative;
use App\Models\paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprenantController extends Controller
{
    public function ma_Formation($id)
    {
        $formation = Formation::with([
            'formateur.user',
            'modules.quiz',
            'modules.lecons.ressources.progressions'
        ])->findOrFail($id);

        $inscription = Inscription::where('formation_id', $id)
                        ->where('user_id', Auth::id())
                        ->where('statut', 'valide')
                        ->first();

        if (!$inscription) {

            return redirect()
                    ->route('details_formations', $id)
                    ->with('error', 'Vous devez être inscrit à cette formation.');

        }

        $modulesDebloques = [];

        foreach ($formation->modules as $index => $module) {

            if ($index == 0) {

                $modulesDebloques[$module->id] = true;

                continue;
            }

            $modulePrecedent = $formation->modules[$index - 1];

            if (!$modulePrecedent->quiz) {

                $modulesDebloques[$module->id] = false;

                continue;
            }

            $modulesDebloques[$module->id] = \App\Models\QuizTentative::where(
                    'user_id',
                    Auth::id()
                )
                ->where(
                    'quiz_id',
                    $modulePrecedent->quiz->id
                )
                ->where(
                    'reussi',
                    true
                )
                ->exists();
        } 

        $modulesTermines = [];

        foreach ($formation->modules as $module) {

            $totalRessources = 0;

            $ressourcesTerminees = 0;

            foreach ($module->lecons as $lecon) {

                foreach ($lecon->ressources as $ressource) {

                    $totalRessources++;

                    $terminee = $ressource->progressions
                        ->where('user_id', Auth::id())
                        ->where('terminee', true)
                        ->count() > 0;

                    if ($terminee) {

                        $ressourcesTerminees++;

                    }

                }

            }

            $modulesTermines[$module->id] =

                $totalRessources > 0 &&
                $totalRessources == $ressourcesTerminees;

        }
        $quizReussis = [];

        $quizTentatives = [];      // dernière tentative (réussie ou non)

        $quizValides = [];         // tentative ayant validé le quiz

        foreach ($formation->modules as $module) {

            if (!$module->quiz) {

                $quizReussis[$module->id] = false;
                $quizTentatives[$module->id] = null;
                $quizValides[$module->id] = null;

                continue;
            }

            // Dernière tentative
            $derniereTentative = QuizTentative::where(
                    'user_id',
                    Auth::id()
                )
                ->where(
                    'quiz_id',
                    $module->quiz->id
                )
                ->latest()
                ->first();

            // Tentative ayant permis de réussir
            $tentativeValidee = QuizTentative::where(
                    'user_id',
                    Auth::id()
                )
                ->where(
                    'quiz_id',
                    $module->quiz->id
                )
                ->where(
                    'reussi',
                    true
                )
                ->latest()
                ->first();

            $quizTentatives[$module->id] = $derniereTentative;

            $quizValides[$module->id] = $tentativeValidee;

            $quizReussis[$module->id] = $tentativeValidee != null;
        }

        

        $progressionsModules = [];

        foreach ($formation->modules as $module) {

            $total = 0;
            $terminees = 0;

            foreach ($module->lecons as $lecon) {

                foreach ($lecon->ressources as $ressource) {

                    $total++;

                    if (
                        $ressource->progressions
                            ->where('user_id', auth()->id())
                            ->where('terminee', true)
                            ->count()
                    ) {

                        $terminees++;

                    }

                }

            }

            $pourcentage = 0;

            if ($total > 0) {

                $pourcentage = round(($terminees / $total) * 100);

            }

            $progressionsModules[$module->id] = [

                'pourcentage' => $pourcentage,

                'terminees' => $terminees,

                'total' => $total

            ];

        }
        return view(
            'ma_formation',
            compact(
                'formation',
                'inscription',
                'modulesDebloques', 
                'modulesTermines',
                'quizReussis',
                'quizTentatives',
                'quizValides',
                
                'progressionsModules'
            )
        );
    }
}
