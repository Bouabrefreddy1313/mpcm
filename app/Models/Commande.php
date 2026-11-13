<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['bon_id', 'telephone', 'montant', 'email', 'statut'];
    
    public function bon()
    {
        return $this->belongsTo(Bon::class);
    }
}