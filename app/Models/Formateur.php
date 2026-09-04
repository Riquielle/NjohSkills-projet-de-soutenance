<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
     protected $fillable = [
        'user_id',
        'telephone',
        'specialite',
        'experience',
        'biographie',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
