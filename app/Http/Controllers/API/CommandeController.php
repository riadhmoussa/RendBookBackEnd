<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandeLocation;
use App\Models\CommandeVente;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;


class CommandeController extends Controller
{
    public function AjouterCommande(Request $request){
        $commande= new Commande();
        $commande->typeCommande=$request->input('typeCommande');
        $commande->conversation_id=$request->input('conversation_id');
        $commande->save();
        $conversation = Conversation::find($commande->conversation_id);
        $conversation->status="accept";
        $conversation->save();
        return response($commande,201);
    }

    public function VerifierExisteCommande($id_conversation){
        $commande  = Commande::where('conversation_id', '=', $id_conversation)->first();
    }


    public function AjouterCommandeVente(Request $request,$id){
         $commandeVente= new CommandeVente();
        $commandeVente->prix=$request->input('prix');
        $commandeVente->commande_id=$request->input('commande_id');
        $commandeVente->save();
        return response($commandeVente,201);
        

    }

    public function AjouterCommandeLocation(Request $request,$id){
          $commandeLocation= new CommandeLocation();
        $commandeLocation->prix=$request->input('prix');
        $commandeLocation->date_debut=$request->input('date_debut');
         $commandeLocation->date_fin=$request->input('date_fin');
          $commandeLocation->commande_id=$request->input('commande_id');
        $commandeLocation->save();
        return response($commandeLocation,201);
    }

    public function AffecteeConversation(Request $request,$id)
    {
        $conversation = Conversation::find($id);
        $conversation->status=$request->input('status');
        $conversation->save();
        return response($conversation,201);
    }


    public function AfficherCommandes($id){
        $commandes = DB::table('commandes')
            ->join('commande_ventes', 'commandes.id', '=', 'commande_ventes.commande_id')
            ->join('commande_locations', 'commandes.id', '=', 'commande_locations.commande_id')
            ->select('users.*', 'commande_ventes.*', 'commande_locations.*')
            ->paginate(10);

            return response($commandes,201);
    }
}
