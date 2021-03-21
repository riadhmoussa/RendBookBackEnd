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
        $commenter->save();
        return response($commenter,201);
    }

    

}
