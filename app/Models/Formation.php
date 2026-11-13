<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'pour_entreprise',
        'domaine_id',
    ];

    public function sousFormations()
    {
        return $this->hasMany(SousFormation::class);
    }
    
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function cours()
{
    return $this->hasMany(Cours::class);
}
}