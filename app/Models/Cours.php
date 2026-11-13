<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'objectif',
        'lieu',
        'public_cible',
        'formateur',
        'prerequis',
        'programme',
        'duree',
        'tarif',
        'description',
        'image',
        'sous_formation_id',
        'eligible',
         'certifiante',
         'etiquette',
        
    ];
     protected $casts = [
        'eligible' => 'boolean',
        'certifiante'   => 'boolean',
       
    ];

    public function sousFormation()
    {
        return $this->belongsTo(SousFormation::class);
    }
    
     // Relation : un cours peut avoir plusieurs formateurs
    public function formateurs()
    {
        return $this->hasMany(Formateur::class);
    }
    public function avis()
{
    return $this->hasMany(Avis::class);
}
}