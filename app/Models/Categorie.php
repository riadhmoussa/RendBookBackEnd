<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $table="categories";
    public function categories()
    {
        return $this->hasMany('App\Models\Produit');
    }

  
}
