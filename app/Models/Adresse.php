<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }
}
