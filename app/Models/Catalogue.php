<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $fillable = ['titre', 'domaine_id', 'fichier'];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
