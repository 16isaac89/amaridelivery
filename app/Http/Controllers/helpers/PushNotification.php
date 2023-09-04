<?php

namespace App\Http\Controllers\helpers;



class PushNotification
{
public function sendneworder($title,$fcm,$message,$type){
    $SERVER_API_KEY = 'AAAAklbjYF8:APA91bEvG2Vvv6cS0KUwhUpPH0t4TfqpaXsW5B-5oOSDpwGGXjGdpnVE4CQX0F49WOYXL5sFKUh7GwuEWdyQ8DOhkTdjXJZ_YGiSPKkVm5S1Qakj4d55-Bhj-Sai2zEKbCA3_9U1f5zW';
    $data = [
        //"registration_ids" => $tokens,
        'to' => $fcm,
        "data" => array(
            'message'=>$message,
            'title'=>$title,
            'msgtype'=>$type
        )


    ];
    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);
}
}
