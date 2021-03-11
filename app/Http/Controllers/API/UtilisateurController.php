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
            $utilisateur->url_picture=$request->input('url_picture');
            $utilisateur->save();
       
        return response(['message' => 'utilisateur add','utilisateur' => $utilisateur, 'access_token'=>""], 201);

    }

    public function show(Request $request ,$id)
    {
        $utilisateur=Utilisateur::where('user_id',$id)->get();
        return response(['utilisateur' => $utilisateur], 201);
    }

 
   
}
