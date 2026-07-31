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


    public function estComplete()
    {
        if($this->modules()->count()==0){
            return false;
        }

        foreach($this->modules as $module){

            if($module->lecons()->count()==0){
                return false;
            }

            if(!$module->quiz){
                return false;
            }

            if($module->quiz->questions()->count()==0){
                return false;
            }

            foreach($module->quiz->questions as $question){

                if($question->reponses()->count()<2){
                    return false;
                }

                if(!$question->reponses()->where('est_correcte',true)->exists()){
                    return false;
                }

            }

            foreach($module->lecons as $lecon){

                if($lecon->ressources()->count()==0){
                    return false;
                }

            }

        }

        return true;
    }

    public function verifierPublication()
    {
        if($this->estComplete()){

            $this->update([
                'statut' => 'publie'
            ]);

        }else{

            $this->update([
                'statut' => 'brouillon'
            ]);

        }
    }
}
