<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function AjouterMessage(Request $request){
       
        $message= new Message();
        $message->contenu=$request->input('contenu');
        $message->expediteur_id=$request->input('expediteur_id');
        $message->receveur_di=$request->input('receveur_di');
        $message->conversation_id=$request->input('conversation_id');
        $message->save();
        return response($message, 201);

    }

    public function AfficherMessageConversation($id){
        $messages = Message::where('conversation_id', '=', $id)->get();
        return response( $messages, 200);
    }

    public function MiseAJourConversation($id_conversation,$last_id){
        $messages = Message::where([
            ['conversation_id', '=', $id_conversation],
            ['id', '>', $last_id]
        ])->get();
        return response($messages,200);
    }

   /* public function ObtenirConversation($id){
        $messages = Message::where('id', '=', $id)->get();
        return response($messages,201);
    }*/
}
