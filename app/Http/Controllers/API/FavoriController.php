<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favori;


class FavoriController extends Controller
{
    public function AjouterFavori(Request $request){
        $favori= new Favori();
        $favori->user_id=$request->input('user_id');
        $favori->product_id=$request->input('product_id');
        $favori->save();
        return response($favori,201);
    }

    public function VerifierProduitPrefere($user_id,$product_id){
        $favori = Favori::where([
                ['user_id','=',$user_id],
                ['product_id','=',$product_id]

        ])->first();
        return response($favori,201);
    }


    public function AnnulerFavori($id) {
        $favori = Favori::find($id);
        $favori->delete();
        return response($favori,201);
    }

}
