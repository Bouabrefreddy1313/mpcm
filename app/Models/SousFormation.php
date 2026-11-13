<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousFormation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'formation_id',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}