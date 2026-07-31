<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Module extends Model
{

     protected $fillable = [
        'formation_id',
        'titre',
        'objectif',
        'ordre',
        
    ];
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    
    public function lecons()
    {
        return $this->hasMany(Lecon::class)
                    ->orderBy('ordre');
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
}
