<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification($message,$title,$id,$type){
       $API_ACCESS_KEY = 'AAAAehZYGkg:APA91bGQKpmEXOKAckMNJdrCg3RG-7gEAGugzPmDDyfo_ZzpmipX9Co8DD2o0jMriI6fe9Rz01Bcan_XDK43UYvnw_tGvhJiMTx-Ezy-WnFRuPQVDINQf6dot5juY-CHZWkLYpctKt3r';
$msg = array
(
    'message' 	=> $message,
	'title'		=> $title,
    'id' => $id,
    'type' => $type,
);

$fields = array('to' => '/topics/news', 'data' => $msg);
$headers = array
(
'Authorization: key=' . $API_ACCESS_KEY,
'Content-Type: application/json'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$pushResult = curl_exec($ch);
curl_close($ch);
    }
}
