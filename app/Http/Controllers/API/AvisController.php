<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avis;
class AvisController extends Controller
{
   public function AjouterAvis(Request $request){
        $avis= new Avis();
        $avis->utilisateur_id=$request->input('utilisateur_id');
        $avis->product_id=$request->input('product_id');
        $avis->note=$request->input('note');
        $avis->save();
        return response($avis, 201);
   }

   
    public function EditAvis(Request $request,$id){
        $avis = Avis::find($id);
        $avis->note= $request->input('note');
        $avis->save();
        return response( $avis, 200);
    }

}
