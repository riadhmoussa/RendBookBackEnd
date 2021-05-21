<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\NotificationController;

class ReclamationController extends Controller
{
    
    public function store(Request $request)
    {

        $reclamation= new Reclamation();
        $reclamation->details=$request->input('details');
        $reclamation->utilisateur_id=$request->input('utilisateur_id');
        $reclamation->save();
        return response($reclamation, 201);
    }


    public function show($id){
        $reclamations = Reclamation::where('utilisateur_id', '=', $id)->get();
        return response( $reclamations, 200);

    }
}
