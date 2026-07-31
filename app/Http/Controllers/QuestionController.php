<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Ajouter une question
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([

            'question'  => 'required|string',

            'reponseA'  => 'required|string',

            'reponseB'  => 'required|string',

            'reponseC'  => 'required|string',

            'reponseD'  => 'required|string',

            'bonne'     => 'required|in:A,B,C,D',

            'points'    => 'required|integer|min:1'

        ]);

        $ordre = $quiz->questions()->count() + 1;

        $question = $quiz->questions()->create([

            'question'=>$request->question,

            'points'=>$request->points,

            'ordre'=>$ordre

        ]);
        $formation->verifierPublication();

        $reponses = [

            'A' => $request->reponseA,

            'B' => $request->reponseB,

            'C' => $request->reponseC,

            'D' => $request->reponseD,

        ];

        foreach ($reponses as $lettre => $texte) {

            $question->reponses()->create([

                'reponse'      => $texte,

                'est_correcte' => $request->bonne == $lettre

            ]);

        }

        return back()->with('success','Question ajoutée avec succès.');

    }

    /*
    |--------------------------------------------------------------------------
    | Modifier une question
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Question $question)
    {

        $request->validate([

            'question'  => 'required|string',

            'reponseA'  => 'required|string',

            'reponseB'  => 'required|string',

            'reponseC'  => 'required|string',

            'reponseD'  => 'required|string',

            'bonne'     => 'required|in:A,B,C,D',

            'points'    => 'required|integer|min:1'

        ]);

        $question->update([

            'question'=>$request->question,

            'points'=>$request->points

        ]);

        $reponses = $question->reponses()->orderBy('id')->get();

        $reponses[0]->update([
            'reponse'=>$request->reponseA,
            'est_correcte'=>$request->bonne=='A'
        ]);

        $reponses[1]->update([
            'reponse'=>$request->reponseB,
            'est_correcte'=>$request->bonne=='B'
        ]);

        $reponses[2]->update([
            'reponse'=>$request->reponseC,
            'est_correcte'=>$request->bonne=='C'
        ]);

        $reponses[3]->update([
            'reponse'=>$request->reponseD,
            'est_correcte'=>$request->bonne=='D'
        ]);

        return back()->with('success','Question modifiée avec succès.');

    }

    /*
    |--------------------------------------------------------------------------
    | Supprimer une question
    |--------------------------------------------------------------------------
    */

    public function destroy(Question $question)
    {

        $question->reponses()->delete();

        $question->delete();

        return back()->with('success','Question supprimée.');

    }

    public function monter(Question $question)
    {
        $precedente = Question::where('quiz_id', $question->quiz_id)
                        ->where('ordre', $question->ordre - 1)
                        ->first();

        if($precedente){

            $ancien = $question->ordre;

            $question->update([
                'ordre'=>$precedente->ordre
            ]);

            $precedente->update([
                'ordre'=>$ancien
            ]);

        }

        return back();
    }

    public function descendre(Question $question)
    {
        $suivante = Question::where('quiz_id', $question->quiz_id)
                        ->where('ordre', $question->ordre + 1)
                        ->first();

        if($suivante){

            $ancien = $question->ordre;

            $question->update([
                'ordre'=>$suivante->ordre
            ]);

            $suivante->update([
                'ordre'=>$ancien
            ]);

        }

        return back();
    }

    public function dupliquer(Question $question)
    {
        // Déterminer le nouvel ordre
        $nouvelOrdre = Question::where('quiz_id', $question->quiz_id)->count() + 1;

        // Copier la question
        $nouvelleQuestion = Question::create([

            'quiz_id'  => $question->quiz_id,

            'question' => $question->question,

            'points'   => $question->points,

            'ordre'    => $nouvelOrdre

        ]);

        // Copier les réponses
        foreach($question->reponses as $reponse){

            $nouvelleQuestion->reponses()->create([

                'reponse'      => $reponse->reponse,

                'est_correcte' => $reponse->est_correcte

            ]);

        }

        return back()->with(
            'success',
            'Question dupliquée avec succès.'
        );
    }

}
