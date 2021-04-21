<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandeLocation;
use App\Models\CommandeVente;
use App\Models\Conversation;

class CommandeController extends Controller
{
    public function AjouterCommande(Request $request){
        $commande= new Commande();
        $commande->typeCommande=$request->input('typeCommande');
        $commande->conversation_id=$request->input('conversation_id');
        $commande->save();
        return response($commande,201);
    }

    public function VerifierExisteCommande($id_conversation){
        $commande  = Commande::where('	conversation_id', '=', $id_conversation)->first();
    }


    public function AjouterCommandeVente(Request $request,$id){
        

    }

    public function AjouterCommandeLocation(Request $request,$id){
        
    }

    public function AffecteeConversation(Request $request,$id)
    {
        $conversation = Conversation::find($id);
        $conversation->status=$request->input('status');
        $conversation->save();
        return response($conversation,201);
    }
}
