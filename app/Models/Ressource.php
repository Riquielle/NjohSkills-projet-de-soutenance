<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecon_id',
        'type',
        'nom',
        'fichier'
    ];

    public function lecon()
    {
        return $this->belongsTo(Lecon::class);
    }
}
