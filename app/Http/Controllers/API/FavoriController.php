<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favori;
use Illuminate\Support\Facades\DB;

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
        if($favori){
            return response(["message"=>"exist","favorite"=>$favori],201);
        }else{
            return response(["message"=>"dont exist","favorite"=>null],201);
        }
        
    }


    public function AnnulerFavori($id) {
        $favori = Favori::find($id);
        $favori->delete();
        return response($favori,201);
    }



    public function AfficherService($id){
      $favoris =  DB::table('favoris')
      ->select(['produits.id','produits.nom','produits.auteur','produits.detaills','produits.type_service','produits.ville',
            'produits.type_operation','produits.prix_vente','produits.prix_jour','produits.prix_semaine',
            'produits.prix_annee','produits.chemin_image','produits.user_id','produits.id_categrie',
            'produits.created_at','produits.updated_at'])
         ->join('produits', function ($join) use($id) {
        $join->on('favoris.product_id', '=', 'produits.id')
             ->where([
                ['favoris.user_id', '=',$id],
                ['produits.type_service', '=', 'service']
             ]);
            })->paginate(10);
        return response($favoris ,201);
    }

    public function AfficherBook($id){
        $favoris =    DB::table('favoris')
        ->select(['produits.id','produits.nom','produits.auteur','produits.detaills','produits.type_service','produits.ville',
   'produits.type_operation','produits.prix_vente','produits.prix_jour','produits.prix_semaine',
   'produits.prix_annee','produits.chemin_image','produits.user_id','produits.id_categrie',
   'produits.created_at','produits.updated_at'])
        ->join('produits', function ($join) use($id) {
       $join->on('favoris.product_id', '=', 'produits.id')
            ->where([
               ['favoris.user_id', '=',$id],
               ['produits.type_service', '=', 'book']
            ]);
   })->paginate(10);

       return response($favoris ,201);
    }

    public function RetraitFavorite($user_id,$product_id){
        $favori = Favori::where(where([
            ['favoris.user_id', '=',$id],
            ['produits.type_service', '=', 'service']
         ]))->first();
        $favori->delete();
        return response($favori,201);
    }

}
