<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adresse;

class AdresseController extends Controller
{
    public function store(Request $request)
    {

        $adresse= new Adresse();
        $adresse->region=$request->input('region');
        $adresse->rue	=$request->input('rue');
        $adresse->batiment	=$request->input('batiment');
        $adresse->utilisateur_id=$request->input('utilisateur_id');
        $adresse->save();
   
        return response(['adresse' => $adresse, 'message' => 'Created successfully'], 201);
    }

    public function show(Request $request){
        $adresses = Adresse::all();
        return response([ 'adresses' =>$adresses, 'message' => 'Retrieved successfully'], 200);

    }
}
