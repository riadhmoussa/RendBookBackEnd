<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; // include this
class Article extends Model
{
    use HasFactory, Notifiable ,HasApiTokens;


    protected $fillable = [
        'name',
        'location',
        'introduction',
        'cost',
    ];

    protected $casts = [
        'cost' => 'int',
    ];
}
