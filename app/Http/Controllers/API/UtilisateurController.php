<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
    

    public function store(Request $request)
    {

            $utilisateur= new Utilisateur();
            $utilisateur->first_name=$request->input('first_name');
            $utilisateur->last_name	=$request->input('last_name');
            $utilisateur->email	=$request->input('email');
            $utilisateur->user_id=$request->input('user_id');
            $utilisateur->save();
       
        return response(['utilisateur' => $utilisateur, 'message' => 'Created successfully'], 201);

    }

    public function show(Request $request ,$id)
    {
        $utilisateur=Utilisateur::where('user_id',$id)->get();
        return response(['utilisateur' => $utilisateur], 201);
    }

 
   
}
