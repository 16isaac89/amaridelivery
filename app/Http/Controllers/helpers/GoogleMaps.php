<?php

namespace App\Http\Controllers\helpers;

class GoogleMaps{



    function getaddressdistance($from,$to){
        $formattedAddrFrom    = str_replace(' ', '+', $from);
        $formattedAddrTo     = str_replace(' ', '+', $to);
        $distance_data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?&origins=$formattedAddrFrom&destinations=$formattedAddrTo&key=AIzaSyDSGXiLg9kRk_93B-s_2VFkrnqHfULeZtI");
        $distance_arr = json_decode($distance_data);
        $elements = $distance_arr->rows[0]->elements;
        $distance = $elements[0]->distance->text;
        $duration = $elements[0]->duration->text;
        $durationmins = intval($elements[0]->duration->value / 60);
        return  (Object)['distance'=>floatval($distance),'duration'=>$duration,'durationmins'=>$durationmins];
    }
}
