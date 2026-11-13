<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelechargementPdf extends Model
{
    use HasFactory;

    protected $table = 'telechargements_pdf';

    protected $fillable = [
    'cours_id',
    'nom',
    'nom_entreprise',
    'email_entreprise',
    'telephone',
    'nom_fichier_pdf',
    'ip_address',
    'user_agent',
];

    /**
     * Relation avec le cours
     */
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }
}