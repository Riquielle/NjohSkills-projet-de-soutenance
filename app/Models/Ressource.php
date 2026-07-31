<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecon_id',
        'type',
        'nom',
        'fichier'
    ];

    public function getIconAttribute()
    {
        return match($this->type){

            'video' => 'fa-video',

            'audio' => 'fa-music',

            'pdf' => 'fa-file-pdf',

            'image' => 'fa-image',


            'zip' => 'fa-file-archive',

            default => 'fa-file'

        };
    }

    public function lecon()
    {
        return $this->belongsTo(Lecon::class);
    }
    public function progressions()
    {
        return $this->hasMany(RessourceProgression::class);
    }
}
