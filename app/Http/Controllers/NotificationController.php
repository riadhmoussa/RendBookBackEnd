<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification($message,$title,$id,$type){
        define( 'AIzaSyBBX0emgCnGpKO6dI3oE8MbHpyJh62JAgA', 'AAAAP7b3V8w:APA91bGOOGRA1xnup1xjlkr5dNpMUN01uLl4ycmeIIChJ79PN1oWRRhaDdjrhDnTmvz4Duy49A-H1_rHjlxM4nWFmsy61pid5sQnrN52_LeyLU69lfF_eW_9bnbiEjL1wIzIv-weoUtP' );


// prep the bundle
$msg = array
(
	'message' 	=> $message,
	'title'		=> $title,
    'id' => $id,
    'type' => $type,
	
);

$fields = array
(
	'to' 	=> '/topics/all',
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: Bearer AAAAP7b3V8w:APA91bGOOGRA1xnup1xjlkr5dNpMUN01uLl4ycmeIIChJ79PN1oWRRhaDdjrhDnTmvz4Duy49A-H1_rHjlxM4nWFmsy61pid5sQnrN52_LeyLU69lfF_eW_9bnbiEjL1wIzIv-weoUtP',
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

    }
}
