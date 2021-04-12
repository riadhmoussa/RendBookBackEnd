<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function AjouterCommande(Request $request){
        $commande= new Commande();
        $commande->typeCommande=$request->input('typeCommande');
        $commande->conversation_id=$request->input('conversation_id');
        $commande->save();
        return response($commande,201);
    }
}
