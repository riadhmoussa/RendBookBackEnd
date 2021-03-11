<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'message' => 'user add','user' => $user, 'access_token' => $accessToken]);
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

        $accessToken =  $user->createToken('authToken')->accessToken;

        return response(['message' => 'valid Credentials','user' =>  $user , 'access_token' => $accessToken]);

    }
    public function HelloWorld(Request $request){
        return "hello world!!!";
    }
}
