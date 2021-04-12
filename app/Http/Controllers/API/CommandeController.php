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
        $commande_vente = new CommandeVente();
        $commande_vente->prix=$request->input('prix');
        $commande_vente->commande_id=$request->input('commande_id');
        $commande_vente->save();
        return response($commande_vente,201);

    }

    public function AjouterCommandeLocation(Request $request,$id){
        $commande_location = new CommandeLocation();
        $commande_location->prix=$request->input('prix');
        $commande_location->commande_id=$request->input('commande_id');
        $commande_location->date_debut=$request->input('date_debut');
        $commande_location->date_fin=$request->input('date_fin');
        $commande_location->save();
        return response($commande_location,201);
    }

    public function AffecteeConversation(Request $request,$id)
    {
        $conversation = Conversation::find($id);
        $conversation->status=$request->input('status');
        $conversation->save();
        return response($conversation,201);
    }
}
