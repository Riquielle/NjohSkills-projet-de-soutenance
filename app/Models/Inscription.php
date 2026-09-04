<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'formation_id',
        'user_id',
        'statut',
        'progression',
        'date_debut',
        'date_fin',
        'prolongee',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'prolongee' => 'boolean',
    ];


    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function apprenant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
