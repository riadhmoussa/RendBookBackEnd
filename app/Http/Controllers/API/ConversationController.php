<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use DB;



class ConversationController extends Controller
{
    public function creerConversation(Request $request){
        $conversation= new Conversation();
        $conversation->acheteur_id=$request->input('acheteur_id');
        $conversation->proprietaire_id=$request->input('proprietaire_id');
        $conversation->product_id=$request->input('product_id');
        $conversation->status="attente";
        $conversation->save();
        error_log($request);
        return response($conversation,201);
    }

    public function AfficherConversation($id){
        $conversation = Conversation::where('id',"=",$id)->first();
        return response($conversation,201);
    }

    public function VerifierExsitConversation($acheteur_id,$proprietaire_id,$product_id){
        $conversation = Conversation::where('acheteur_id', '=',$acheteur_id)
            ->where('proprietaire_id', '=', $proprietaire_id)
            ->where('product_id', '=', $product_id)
            ->first();
            if($conversation){
                return response(["message"=>"exist","conversation"=>$conversation],201);
            }else{
                return response(["message"=>"dont exist","conversation"=>null],201);
            }

        
    }


    public function AfficherMonListeConversation($id){
        $messages  = DB::table('messages')
        ->select(["messages.*","user1.first_name as expediteurFirstName","user1.last_name as expediteurLastName","user1.url_picture as expediteurUrlPicture","user2.first_name as receveurFirstName","user2.last_name as receveurLast","user2.url_picture as receveurUrlPicture"])
          ->join('utilisateurs as user1', 'user1.user_id', '=', 'messages.expediteur_id')
          ->join('utilisateurs as user2', 'user2.user_id', '=', 'messages.receveur_di')
          ->where('expediteur_id',"=",$id)
          ->orWhere('receveur_di',"=",$id)
          ->orderBy('conversation_id', 'desc')
          ->groupBy('conversation_id')
          ->paginate();
        return response($messages,201);
    }
}
