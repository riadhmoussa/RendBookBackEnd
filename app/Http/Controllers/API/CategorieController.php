<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Adresse;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Log;

class CategorieController extends Controller
{
    public function getAllCategories() {
        $categories = Categorie::paginate(10);
        return response($categories, 200);
      }


      public function getAllCategoriesSansPagination(){
         $categories = Categorie::all();
        return response($categories, 200);
      }

      public function getCategoryAndAddress($id){
        $categories = Categorie::all();
        $adresses = Adresse::where('utilisateur_id', '=', $id)->get();

        return response(["categories"=>$categories,"adresses"=>$adresses],201);
        
      }


     public function addCategories(Request $request){

        $categorie= new Categorie();
        $categorie->name=$request->input('name');
        $categorie->url_picture=$request->input('url_picture');
        $categorie->save();
        return response($categorie,201);
      }

      public function SupprimerCategoire($id) {
          $categorie = Categorie::find($id);
          $categorie->delete();
          return response($categorie,201);
      }


    




}
