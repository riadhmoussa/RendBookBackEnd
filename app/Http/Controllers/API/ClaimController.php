<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Http\Controllers\NotificationController;
use DB;

class ClaimController extends Controller
{
       public function AjouterClaim(Request $request){
        $claim= new Claim();
        $claim->details=$request->input('details');
        $claim->seen=false;
        $claim->utilisateur_id=$request->input('utilisateur_id');
        $claim->commande_id=$request->input('commande_id');
        $claim->save();
        return response($claim,201);
    }

     public function AfficherReclamation($id){
        $claims = Claim::where('utilisateur_id',"=",$id)->paginate(10);
        return response($claims,200);
    }

    public function AfficherToutReclaamtion(){
            $claims = Claim::all();
            return response($claims,200);

    }

       public function editEtat($id){
        $claim = Claim::find($id);
        $claim->seen= true;
        $claim->save();
        return response( $claim, 200);
    }
     public function editNoteAdminstration(Request $request,$id){
        $claim = Claim::find($id);
        $claim->notes_administration= $request->input('notes_administration');
        $claim->save();
        return response( $claim, 200);
    }

    public function ClaimDetaills($id){
          $produit = DB::table('produits')
    ->join('conversations', 'conversations.product_id', '=', 'produits.id')
    ->join('commandes','commandes.conversation_id','=','conversations.id')
    ->where('commandes.id', '=' , $id)
    ->get();
            return response($produit,201);

    }

}
