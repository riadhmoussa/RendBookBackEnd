<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commenter;
use App\Models\Produit;

use DB;
use App\Http\Controllers\NotificationController;


class CommenterController extends Controller
{
    public function AjouterCommenter(Request $request){
        $commenter= new Commenter();
        $commenter->crops=$request->input('crops');
        $commenter->id_produit=$request->input('id_produit');
        $commenter->user_id=$request->input('user_id');
        $commenter->save();
        $produit = Produit::find($request->id_produit);
        app(\App\Http\Controllers\NotificationController::class)->sendNotification(
            'hello','world!!!',$produit->user_id,'comment');

        return response($commenter,201);
    }

    public function AfficherCommentaire($id){
        $commenters = Commenter::where('id_produit', '=', $id)->get();
        return response( $commenters, 200);
    }

    function AfficherCommntairesUtilisateur($id){
        $commenters = DB::table('commenters')
    ->join('utilisateurs', 'commenters.user_id', '=', 'utilisateurs.id')
    ->where('id_produit', '=' , $id)
    ->get();

    return response($commenters,201);
    }
    

}
