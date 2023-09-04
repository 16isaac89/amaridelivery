<?php

namespace App\Http\Controllers\helpers;

class HelperClass{
    public function nearestDriver($latitude,$longitude,$driver,$sent){
        $radius = intval(\App\Models\Setting::where('name','radius')->first()->value);
        $driver = \DB::table("drivers")
             ->select("*", \DB::raw("6371 * acos(cos(radians(" . $latitude . "))
             * cos(radians(drivers.lat))
             * cos(radians(drivers.longi) - radians(" . $longitude . "))
             + sin(radians(" .$latitude. "))
             * sin(radians(drivers.lat))) AS distance"))
             ->whereIn('id',$driver)
             ->whereNotIn('id',$sent)
            // ->where('active',1)
            // ->where('ostatus','available')
             ->havingRaw("distance < ?", [$radius])
             //->having('distance', '<', 3.9)
            // ->get();
            ->first();
             return $driver;
    }

    public function driverspushNotification($order,$fcm,$nottype)
    {
    $SERVER_API_KEY = 'AAAAklbjYF8:APA91bEvG2Vvv6cS0KUwhUpPH0t4TfqpaXsW5B-5oOSDpwGGXjGdpnVE4CQX0F49WOYXL5sFKUh7GwuEWdyQ8DOhkTdjXJZ_YGiSPKkVm5S1Qakj4d55-Bhj-Sai2zEKbCA3_9U1f5zW';
      
    $data = [
        'to'=>$fcm,
        'notification'=>[
            "title" => 'NEW ORDER',
            "body"  =>'You have a new order request'
        ],
        "data" => [

           "body" => (object)['type'=>'0','message'=>'You have a new order assigned.','order'=>$order],

        ]
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