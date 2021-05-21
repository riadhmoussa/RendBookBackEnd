<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Http\Controllers\NotificationController;

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

}
