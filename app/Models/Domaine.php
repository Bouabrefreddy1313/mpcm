<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
   
    protected $fillable = ['titre'];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
