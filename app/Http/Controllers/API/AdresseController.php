<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Log;

class AdresseController extends Controller
{
    public function store(Request $request)
    {

        $adresse= new Adresse();
        $adresse->ville=$request->input('ville');
        $adresse->region=$request->input('region');
        $adresse->rue	=$request->input('rue');
        $adresse->batiment	=$request->input('batiment');
        $adresse->utilisateur_id=$request->input('utilisateur_id');
        $adresse->save();
        return response($adresse, 201);
    }

    public function show($id){
        $adresses = Adresse::where('utilisateur_id', '=', $id)->paginate(10);
        return response( $adresses, 200);

    }

    public function editeAdresse(Request $request,$id){
        $adresse = Adresse::find($id);
        $adresse->ville= $request->input('ville');
        $adresse->region =$request->input('region');
        $adresse->rue = $request->input('rue');
        $adresse->batiment = $request->input('batiment');
        $adresse->save();
        return response( $adresse, 200);
    }
}
