<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function creerConversation(Request $request){
        $conversation= new Conversation();
        $conversation->acheteur_id=$request->input('acheteur_id');
        $conversation->proprietaire_id=$request->input('proprietaire_id');
        $conversation->product_id=$request->input('product_id');
        $conversation->save();
        return response($conversation,201);
    }

    public function VerifierExsitConversation($acheteur_id,$proprietaire_id,$product_id){
        $conversation = Conversation::where('acheteur_id', '=',$acheteur_id)
            ->where('proprietaire_id', '=', $proprietaire_id)
            ->where('product_id', '=', $product_id)
            ->first();
         if($conversation){
            return response($conversation,201);
         }else{
             return response(["message" => "Conversation not found"],404);
         }

        
    }
}
