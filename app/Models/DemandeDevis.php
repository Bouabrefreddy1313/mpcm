<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDevis extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'numero', 'email', 'ville', 'cours_id'];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }
}