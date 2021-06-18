<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Utilisateur;
use App\Models\Favori;
use App\Models\User;
use App\Models\AdresseProduit;
use App\Models\Avis;
use App\Http\Controllers\NotificationController;
use DB;
use Illuminate\Support\Facades\Log;


class ProduitController extends Controller
{
    public function Ajouter(Request $request)
    {
        
        $produit= new Produit();
        $produit->nom=$request->input('nom');
        $produit->auteur=$request->input('auteur');
        $produit->detaills=$request->input('detaills');
        $produit->id_categrie=$request->input('id_categrie');
        $produit->ville=$request->input('ville');
        $produit->type_operation=$request->input('type_operation');
        $produit->prix_vente=$request->input('prix_vente');
        $produit->prix_jour=$request->input('prix_jour');
        $produit->prix_semaine=$request->input('prix_semaine');
        $produit->prix_annee=$request->input('prix_annee');
        $produit->chemin_image=$request->input('chemin_image');
        $produit->user_id=$request->input('user_id');
        $produit->type_service=$request->input('type_service');
        $produit->save();
        return response($produit, 201);
    }
    public function AfficherProduits(){
        $books = Produit::paginate(10);
        return response($books,200);
    }

    public function AfficherProduitsPlusDemande(){
            $produits = Produit::leftJoin('conversations','produits.id','=','conversations.product_id')
           ->selectRaw('produits.*, count(conversations.product_id) AS `count`')
            ->having('count','>','0')
           ->groupBy('produits.id')
           ->orderBy('count','DESC')
           ->paginate(10);
           return response($produits,201);
    }

    public function AfficherLivres(){
        $books = Produit::where('type_service',"=","book")->get();
        return response($books,200);
    }

    public function AfficherServices(){
        $books = Produit::where('type_service',"=","service")->get();
        return response($books,200);
    }

    public function AfficheMonLivres($id){
        $books = Produit::where(
            [
            ['user_id', '=', $id],
            ['type_service', '=', 'book']
            ])->paginate(10);
        return response( $books, 200);

    }

    public function AfficheMonService($id){
        $books = Produit::where(
            [
            ['user_id', '=', $id],
            ['type_service', '=', 'service']
            ])->paginate(10);
        return response( $books, 200);

    }

    public function AjouterService(Request $request)
    {
        error_log($request);
        $produit= new Produit();
        $produit->nom=$request->input('nom');
        $produit->detaills=$request->input('detaills');
        $produit->id_categrie=$request->input('id_categrie');
        $produit->ville=$request->input('ville');
        $produit->prix_vente=$request->input('prix_vente');
        $produit->chemin_image=$request->input('chemin_image');
        $produit->user_id=$request->input('user_id');
        $produit->type_service=$request->input('type_service');
        $produit->save();
        return response($produit, 201);
    }


    public function SupprimerProduit ($id) {

          $produit = Produit::find($id);
          $produit->delete();
          return response($produit,201);

        
      }

      public function getProductByCategorie($id,$ville=null){
        if (empty($ville)) { 
            $produit = Produit::where(
               'id_categrie',"=",$id)->get();
            return response($produit,201);
        }else{
            $produit = Produit::where(
                [
                    ['id_categrie',"=",$id]
                ],
                [['ville','like','%' .$ville. '%']])->get();
            return response($produit,201);
        }
      }

      public function getProductById($id,$user_id){
          $produit = Produit::find($id);
          $utilisateur  = Utilisateur::find($produit->user_id);
          $phone_number = User::find($utilisateur->user_id)->first()->phone_number;
         $avg_stars = DB::table('avis')
                ->avg('note');
        $results = Avis::where("utilisateur_id","=",$user_id)
         ->where("product_id","=",$produit->id)
        ->first();
        
          return response(["product" => $produit,"utilisateur"=>$utilisateur,"phone_number"=>$phone_number,"stars"=>$avg_stars,"avis"=>$results],201);
      }


      public function AfficherLivreId($id){
          $produit = Produit::find($id);
        return response($produit,201);
      }


      public function AfficherLivreDetails($id){
          $produit = Produit::find($id);
          $utilisateur = Utilisateur::find($produit->user_id);
          return response(["product"=>$produit,"utilisateur"=>$utilisateur],201);
      }

      public function RechercheProduits($typeRecherche,$nom,$id_categorie,$ville){
          if($typeRecherche=="one"){

                $produits = Produit::where('nom','like','%'.$nom.'%')->paginate(10);
          return response($produits,201);
          }else if($typeRecherche=="two"){


 $produits = Produit::where('ville','=',$ville)->
        where('id_categrie','=',$id_categorie)
        ->paginate(10);
        return response($produits,201);


          }else if($typeRecherche=="three"){

            
 $produits = Produit::where('nom', 'like','%'.$nom.'%')
            ->where('ville', '=', $ville)
            ->where('id_categrie', '=', $id_categorie)
            ->paginate(10);

        return response($produits,201);
          }else if($typeRecherche=="four"){
$produits = Produit::where('id_categrie', '=', $id_categorie)
            ->paginate(10);

        return response($produits,201);
          }
          else{
              $produits = Produit::paginate(10);
              return response($produits,201);
          }

      }


     public function RechercheThreFact(Request $request){
        //error_log($request->ville);
        //error_log($request->id_categorie);
        //error_log($request->nom);
            $produits = Produit::where('nom', 'like','%'.$request->nom.'%')
            ->where('ville', '=', $request->ville)
            ->where('id_categrie', '=', $request->id_categorie)
            ->paginate(10);

        return response($produits,201);
      }

      public function RechrcheTwoFact(Request $request){
       // error_log($request->ville);
       // error_log($request->id_categorie);
        $produits = Produit::where('ville','=',$request->ville)->
        where('id_categrie','=',$request->id_categorie)
        ->paginate(10);
        return response($produits,201);
      }

      public function RechercheOneFact(Request $request){
          $produits = Produit::where('nom','like','%'.$request->nom.'%')->paginate(10);
          return response($produits,201);
      }


       public function getAllProduit(){
        $books = Produit::all();
        return response($books,200);
    }
    

}
