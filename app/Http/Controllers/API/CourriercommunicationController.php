<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courriercommunication;
use Illuminate\Support\Facades\Log;


class CourriercommunicationController extends Controller
{
    public function store(Request $request)
    {

        $courriercommunication= new Courriercommunication();
        $courriercommunication->full_name=$request->input('full_name');
        $courriercommunication->phone_number=$request->input('phone_number');
        $courriercommunication->email	=$request->input('email');
        $courriercommunication->subject	=$request->input('subject');
        $courriercommunication->text_body = $request->input('text_body');
        $courriercommunication->utilisateur_id=$request->input('utilisateur_id');
        $courriercommunication->save();
        return response($courriercommunication, 201);
    }

    public function show($id){
        $courriercommunications = Courriercommunication::where('utilisateur_id', '=', $id)->get();
        return response( $courriercommunications, 200);

    }
}
