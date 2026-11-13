<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';

    protected $fillable = [
        'cours_id',
        'nom',
        'etoiles',
        'commentaire'
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }
}