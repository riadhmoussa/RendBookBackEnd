<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livre;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\NotificationController;

class LivreController extends Controller
{
    
    public function store(Request $request)
    {
        $livre= new Livre();
        $livre->nom=$request->input('nom');
        $livre->auteur=$request->input('auteur');
        $livre->detaills=$request->input('detaills');
        $livre->id_categrie=$request->input('id_categrie');
        $livre->ville=$request->input('ville');
        $livre->type_operation=$request->input('type_operation');
        $livre->prix_vente=$request->input('prix_vente');
        $livre->prix_jour=$request->input('prix_jour');
        $livre->prix_semaine=$request->input('prix_semaine');
        $livre->prix_annee=$request->input('prix_annee');
        $livre->chemin_image=$request->input('chemin_image');
        $livre->user_id=$request->input('user_id');
        $livre->save();
        return response($livre, 201);
    }

    public function show(){
        $livres = Livre::all();
        return response($livres,200);
    }

    public function GetMybooks($id){
        $livres = Livre::where('user_id', '=', $id)->get();
        return response( $livres, 200);

    }

    public function getlivre($id){
        $livre = Livre::where('id', '=', $id)->get();
        return response($livre, 200);
    }

    public function deletelivre ($id) {
        $livre = Livre::where('id', '=', $id)->get();
        $livre->delete();
        return response(['message'=>"deleted"]);
      }
}
