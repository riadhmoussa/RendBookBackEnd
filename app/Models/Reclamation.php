<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }
}
