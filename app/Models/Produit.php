<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function Categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }

    public function Utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }

    
}
