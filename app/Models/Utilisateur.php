<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'user_id',
        'url_picture'       
    ];


    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }



    public $table="utilisateurs";
    public function articles()
    {
        return $this->hasMany('App\Models\Adresse');
    }
}
