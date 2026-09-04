<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Formation;

class Paiement extends Model
{
    protected $fillable = [
        'formation_id',
        'user_id',
        'montant',
        'methode',
        'reference',
        'statut',
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
        return $this->belongsTo(User::class, 'user_id');
    }
}