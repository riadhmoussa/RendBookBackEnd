<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Log;

class ProduitController extends Controller
{
    public function AjouterLivre(Request $request)
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
    public function Afficher(){
        $books = Produit::all();
        return response($books,200);
    }

    public function AfficherLivre(){
        $books = Produit::where('type_service',"=","book")->get();
        return response($books,200);
    }

    public function AfficherService(){
        $books = Produit::where('type_service',"=","service")->get();
        return response($books,200);
    }

    public function AfficheMonLivre($id){
        $books = Produit::where(
            [
            ['user_id', '=', $id],
            ['type_service', '=', 'book']
            ])->get();
        return response( $books, 200);

    }

    public function AfficheMonService($id){
        $books = Produit::where(
            [
            ['user_id', '=', $id],
            ['type_service', '=', 'service']
            ])->get();
        return response( $books, 200);

    }

    public function AjouterService(Request $request)
    {
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


    

}
