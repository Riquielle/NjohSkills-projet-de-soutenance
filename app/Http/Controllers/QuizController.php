<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizTentative;

use Illuminate\Http\Request;

class QuizController extends Controller
{
     /**
     * Afficher le quiz d'un module
     */
    public function quiz(Module $module)
    {
        $module->load([

            'quiz' => function ($query) {

                $query->with([

                    'questions' => function ($query) {

                        $query->orderBy('ordre');

                    },

                    'questions.reponses'

                ]);

            }

        ]);

        return view('quiz', [

            'module' => $module,

            'quiz' => $module->quiz

        ]);
    }

    /**
     * Créer le quiz
     */
    public function store(Request $request, Module $module)
    {

        if($module->quiz){

            return back()->with('error',
                'Ce module possède déjà un quiz.');

        }

        $request->validate([

            'titre'=>'required|string|max:255',

            'description'=>'nullable|string',

            'note_minimale'=>'required|integer|min:0|max:100'

        ]);

        Quiz::create([

            'module_id'=>$module->id,

            'titre'=>$request->titre,

            'description'=>$request->description,

            'note_minimale'=>$request->note_minimale,

            'source'=>'manuel'

        ]);
        $formation->verifierPublication();
        
        return back()->with('success',
            'Quiz créé avec succès.');

    }

    /**
     * Modifier le quiz
     */
    public function update(Request $request, Quiz $quiz)
    {

        $request->validate([

            'titre'=>'required|string|max:255',

            'description'=>'nullable|string',

            'note_minimale'=>'required|integer|min:0|max:100'

        ]);

        $quiz->update([

            'titre'=>$request->titre,

            'description'=>$request->description,

            'note_minimale'=>$request->note_minimale

        ]);

        return back()->with('success',
            'Quiz modifié avec succès.');

    }

    /**
     * Supprimer le quiz
     */
    public function destroy(Quiz $quiz)
    {

        $quiz->delete();

        return back()->with('success',
            'Quiz supprimé.');

    }

    public function historique($quiz)
    {

        $quiz = Quiz::findOrFail($quiz);

        $tentatives = QuizTentative::where(
            'quiz_id',
            $quiz->id 
        )
        ->where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->paginate(5);

        $meilleureNote = QuizTentative::where('quiz_id', $quiz->id)
            ->where('user_id', auth()->id())
            ->max('note');

        $quizValide = QuizTentative::where('quiz_id', $quiz->id)
            ->where('user_id', auth()->id())
            ->where('reussi', true)
            ->exists();


        


        return view(
            'historique',
            compact(
                'tentatives',
                'meilleureNote',
                'quizValide',
                'quiz'
            )
        );

    }
}
