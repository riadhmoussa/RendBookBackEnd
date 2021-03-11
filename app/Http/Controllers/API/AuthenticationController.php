<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur;



class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        return response([ 'salut' => 'hello world!!!!!']);
    }
}
