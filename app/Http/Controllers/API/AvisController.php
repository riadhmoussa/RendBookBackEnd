<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avis;
use DB;



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

    public function AfficherAvis($user_id,$product_id){
        $avis = DB::table('avis')
                    ->where('utilisateur_id', '=', $user_id)
                    ->where('product_id','=', $product_id)
                    ->first();
                    if($avis){
                        return response( ["exist"=>true,"avis"=>$avis], 200);
                    }else{
                         return response( ["exist"=>false,"avis"=>null], 200);
                    }
                      
    }

}
