<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\NotificationController;

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

    public function VerifierUtilisateur($id){
         
$utilisateur = Utilisateur::where('user_id', $id)->first();
        if($utilisateur){
                return response([ 'message' => 'exist','user' =>$utilisateur],201);
        }else{
            return response([ 'message' => 'notexist','user' =>null],201);
        }
        
    }
    

    public function ChangePhoto(Request $request,$id){
    
   
        $utilisateur = Utilisateur::where('user_id', $id)->first();
        $utilisateur->url_picture = $request->url_picture;
        $utilisateur->save();
        return response($utilisateur,201);
  
    }

    public function AjourInfo(Request $request ,$id){
        $utilisateur = Utilisateur::where('user_id',$id)->first();
        $utilisateur->first_name = $request->first_name;
        $utilisateur->last_name=$request->last_name;
        $utilisateur->email=$request->email;
        $utilisateur->save();
        return response($utilisateur,201);
    }

    public function getUsers(){

        $users = Utilisateur::join('users', 'utilisateurs.user_id', '=', 'users.id')
              ->get();
              
     
        return response($users,200);

    }

    public function updateStatus(Request $request, $id) {
        $user = User::find($id);
        if($user->status==="allowed"){
            $user->status="blocked";
        }else{
            $user->status="allowed";
        }
        $user->save();
        return response($user,200);
      
   
    }
}
