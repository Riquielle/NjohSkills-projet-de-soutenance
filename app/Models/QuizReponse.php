<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizReponse extends Model
{
    protected $fillable = [

        'quiz_tentative_id',

        'question_id',

        'reponse_id',

        'est_correcte'

    ];

    protected $casts = [

        'est_correcte'=>'boolean'

    ];

    public function tentative()
    {
        return $this->belongsTo(
            QuizTentative::class,
            'quiz_tentative_id'
        );
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function reponse()
    {
        return $this->belongsTo(Reponse::class);
    }
    public function quizReponses()
    {
        return $this->hasMany(QuizReponse::class);
    }
}
