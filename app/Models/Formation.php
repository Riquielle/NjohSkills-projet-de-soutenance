<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
   protected $fillable = [
        'formateur_id',
        'titre',
        'description',
        'titre_apercu',
        'apercu',
        'prix',
        'duree',
        'image'
    ];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class)
                    ->orderBy('ordre');
    }
}
