<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }
}
