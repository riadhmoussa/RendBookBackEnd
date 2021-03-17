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



    public $table_utilisateur="utilisateurs";
    public function utilisateurs()
    {
        return $this->hasMany('App\Models\Adresse');
    }


    public $table_reclamation="reclamations";
    public function reclamations()
    {
        return $this->hasMany('App\Models\Reclamation');
    }


    public $table_courriercommunications="courriercommunications";
    public function courriercommunications()
    {
        return $this->hasMany('App\Models\Courriercommunication');
    }


    public $table_produit="produits";
    public function produits()
    {
        return $this->hasMany('App\Models\Produit');
    }
}
