<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commenter;


class CommenterController extends Controller
{
    public function AjouterCommenter(Request $request){
        $commenter= new Commenter();
        $commenter->crops=$request->input('crops');
        $commenter->id_produit=$request->input('id_produit');
        $commenter->user_id=$request->input('user_id');
        $commenter->save();
        return response($commenter,201);
    }

    public function AfficherCommentaire($id){
        $commenters = Commenter::where('id_produit', '=', $id)->get();
        return response( $commenters, 200);
    }
    

}
