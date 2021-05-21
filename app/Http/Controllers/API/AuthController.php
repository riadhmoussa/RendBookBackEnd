<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Utilisateur;
use App\Http\Controllers\NotificationController;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;
        $user->save();
        //$user = User::create($validatedData);
        //$accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'message' => 'user add','user' => $user]);
    }

   

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'phone_number' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('phone_number', '=', $request->phone_number)->first();

        if (empty($user)) {
            return response(['message' => 'Invalid Credentials']);
        }

       // $accessToken =  $user->createToken('authToken')->accessToken;
       $utitlisateur = Utilisateur::where('user_id','=',$user->id)->first();
        return response(['message' => 'valid Credentials','user' =>  $utitlisateur]);

    }
    public function HelloWorld(Request $request){
        return "hello world!!!";
    }
}
