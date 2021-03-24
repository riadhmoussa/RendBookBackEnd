<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Log;

class UtilisateurController extends Controller
{
    

    public function creerUtilisateur(Request $request)
    {
        
        $utilisateur = new Utilisateur([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'user_id' => $request->get('user_id'),
            'url_picture' => $request->get('url_picture')
        ]);
        //Log::channel('stderr')->info('Something happened!'.$request);
        $utilisateur->save();
       
        return response(['message' => 'utilisateur add','utilisateur' => $utilisateur]);

    }

    public function obtenirUtilisateur(Request $request ,$id)
    {
        $utilisateur = Utilisateur::where('user_id', $id)->first();
        return response($utilisateur, 200);
    }

    public function ChangePhoto(Request $request,$id){
    
    {
        $utilisateur = Utilisateur::where('user_id', $id)->first();
        $utilisateur->url_picture = $request->url_picture;
        $utilisateur->save();
        return response($utilisateur,201);
    }
    }
}
