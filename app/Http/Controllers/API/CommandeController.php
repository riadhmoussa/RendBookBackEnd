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


    public function AjouterCommandeVente(Request $request){
         $commandeVente= new CommandeVente();
        $commandeVente->prix=$request->input('prix');
        $commandeVente->commande_id=$request->input('commande_id');
        $commandeVente->save();
        return response($commandeVente,201);
        

    }

    public function AjouterCommandeLocation(Request $request){
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


    public function AfficherCommandesGet($id){
            $commandeGratuit = DB::table('commandes')
            ->select('commandes.*','produits.*')
            ->join('conversations', 'commandes.conversation_id', '=', 'conversations.id')
            ->join('produits','conversations.product_id','produits.id')
            ->where('commandes.typeCommande','=',"مجاني")
            ->where('conversations.acheteur_id','=',$id)
            ->get();

            $commandesVente = DB::table('commandes')
            ->select('commandes.*','produits.*','commande_ventes.*')
            ->join('commande_ventes', 'commandes.id', '=', 'commande_ventes.commande_id')
             ->join('conversations', 'commandes.conversation_id', '=', 'conversations.id')
            ->join('produits','conversations.product_id','produits.id')
              ->where('conversations.acheteur_id','=',$id)
            ->get();

$commandeLocation = DB::table('commandes')
->select('commandes.*','produits.*','commande_locations.*')
            ->join('commande_locations', 'commandes.id', '=', 'commande_locations.commande_id')
             ->join('conversations', 'commandes.conversation_id', '=', 'conversations.id')
            ->join('produits','conversations.product_id','produits.id')
              ->where('conversations.acheteur_id','=',$id)
            ->get();
        $result = $commandesVente->merge($commandeLocation);
        $resultfinal = $result->merge($commandeGratuit);
        $commandes = $resultfinal->all();

        
       
           
            return response($commandes,201);
    }
    public function AfficherCommandePost($id){
          $commandeGratuit = DB::table('commandes')
            ->select('commandes.*','produits.*')
            ->join('conversations', 'commandes.conversation_id', '=', 'conversations.id')
            ->join('produits','conversations.product_id','produits.id')
            ->where('commandes.typeCommande','=',"مجاني")
             ->where('conversations.acheteur_id','<>',$id)
            ->get();

            $commandesVente = DB::table('commandes')
            ->select('commandes.*','produits.*','commande_ventes.*')
            ->join('commande_ventes', 'commandes.id', '=', 'commande_ventes.commande_id')
             ->join('conversations', 'commandes.conversation_id', '=', 'conversations.id')
            ->join('produits','conversations.product_id','produits.id')
              ->where('conversations.acheteur_id','<>',$id)
            ->get();

$commandeLocation = DB::table('commandes')
->select('commandes.*','produits.*','commande_locations.*')
            ->join('commande_locations', 'commandes.id', '=', 'commande_locations.commande_id')
             ->join('conversations', 'commandes.conversation_id', '=', 'conversations.id')
            ->join('produits','conversations.product_id','produits.id')
              ->where('conversations.acheteur_id','<>',$id)
            ->get();
        $result = $commandesVente->merge($commandeLocation);
        $resultfinal = $result->merge($commandeGratuit);
        $commandes = $resultfinal->all();

        
       
           
            return response($commandes,201);
    }



   
}
