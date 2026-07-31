<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizTentative extends Model
{
     protected $fillable = [

        'user_id',

        'quiz_id',

        'note',

        'reussi',

        'date_passage',

        'temps'

    ];

    protected $casts = [

        'reussi'=>'boolean',

        'date_passage'=>'datetime'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function reponses()
    {
        return $this->hasMany(QuizReponse::class);
    }
}
