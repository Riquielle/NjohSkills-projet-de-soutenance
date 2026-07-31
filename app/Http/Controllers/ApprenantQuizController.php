<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizTentative;
use App\Models\QuizReponse;
use App\Models\Inscription;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ApprenantQuizController extends Controller
{
    public function passer(Quiz $quiz)
    {

        $quizDejaReussi = QuizTentative::where('user_id', Auth::id())
        ->where('quiz_id', $quiz->id)
        ->where('reussi', true)
        ->exists();

        if($quizDejaReussi){

            return redirect()
                ->route('resultat.quiz', $quiz->id)
                ->with('info','Vous avez déjà validé ce quiz.');

        }
        $quiz->load([
            'questions.reponses'
        ]);

        return view(
            'passer',
            compact('quiz')
        );
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $user = Auth::user();

        $questions = $quiz->questions()->with('reponses')->get();

        $score = 0;

        $pointsTotal = $questions->sum('points');

        $tentative = QuizTentative::create([

            'user_id' => $user->id,

            'quiz_id' => $quiz->id,

            'note' => 0,

            'reussi' => false,

            'date_passage' => now()

        ]);

        foreach($questions as $question){

            $reponseChoisie = $request->reponse[$question->id] ?? null;

            $bonne = $question->reponses
                        ->where('est_correcte',true)
                        ->first();

            $correcte = false;

            if($bonne && $bonne->id == $reponseChoisie){

                $correcte = true;

                $score += $question->points;

            }

            QuizReponse::create([

                'quiz_tentative_id'=>$tentative->id,

                'question_id'=>$question->id,

                'reponse_id'=>$reponseChoisie,

                'est_correcte'=>$correcte

            ]);

        }

        $note = round(($score/$pointsTotal)*100);

        $reussi = $note >= $quiz->note_minimale;

        $tentative->update([
            'note' => $note,
            'reussi' => $reussi
        ]);

        if ($reussi) {

            $formationTerminee = $this->mettreAJourProgressionFormation(
                $quiz,
                $user->id
            );

        }

        return redirect()->route('resultat',$tentative->id);

    }



    private function mettreAJourProgressionFormation(Quiz $quiz, $userId)
    {
        $formation = $quiz->module->formation;

        $totalModules = $formation->modules()->count();

        $modulesValides = 0;

        foreach ($formation->modules as $module) {

            if (!$module->quiz) {
                continue;
            }

            $quizReussi = QuizTentative::where('user_id', $userId)
                ->where('quiz_id', $module->quiz->id)
                ->where('reussi', true)
                ->exists();

            if ($quizReussi) {
                $modulesValides++;
            }
        }

        $progression = 0;

        if ($totalModules > 0) {
            $progression = round(($modulesValides / $totalModules) * 100);
        }

        Inscription::where('user_id', $userId)
            ->where('formation_id', $formation->id)
            ->update([
                'progression' => $progression
            ]);

        return $modulesValides == $totalModules;
    }

    public function resultat(QuizTentative $tentative)
    {

        $tentative->load(
            'quiz.module.formation',
            'user'
        );

        return view(
            'resultat',
            compact('tentative')
        );

        
    }

    private function moduleSuivant(Quiz $quiz)
    {
        return Module::where('formation_id', $quiz->module->formation_id)
            ->where('ordre', '>', $quiz->module->ordre)
            ->orderBy('ordre')
            ->first();
    }
}
