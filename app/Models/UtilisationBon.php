<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisationBon extends Model
{
    use HasFactory;

    protected $fillable = ['bon_id', 'nom_client', 'formation'];

    public function bon()
    {
        return $this->belongsTo(Bon::class);
    }
}