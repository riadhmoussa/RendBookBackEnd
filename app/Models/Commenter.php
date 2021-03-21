<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commenter extends Model
{
    public function Commenter()
    {
        return $this->belongsTo('App\Models\Commenter');
    }

}
