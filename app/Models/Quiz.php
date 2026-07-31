<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'module_id',
        'titre',
        'description',
        'note_minimale'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function tentatives()
    {
        return $this->hasMany(QuizTentative::class);
    }

   
}
