<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'titre',
        'description',
        'ordre'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
}
