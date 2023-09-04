<?php

namespace App\Http\Controllers\api\v1\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\helpers\GoogleMaps;
use App\Http\Controllers\helpers\HelperClass;
use App\Models\Zone;
use App\Models\ZoneVehicleCategory;
use App\Models\Fleet;
use App\Models\Order;
use App\Http\Controllers\helpers\PaymentGateWay;
use App\Models\Partner;

class OrderController extends Controller
{
    public function getzones(Request $request){
        $from = $request->from;
        $to = $request->to;
        $google = (new GoogleMaps)->getaddressdistance($from,$to);
        $distance = $google->distance;
        $zone = Zone::where('from','<=',$distance)->where('to','>=',$distance)->first();
        $categories = ZoneVehicleCategory::with('vehicle_category')->where('zone_id',$zone->id)->get();
        return response()->json(['distance'=>$distance,'categories'=>$categories,'duration'=>$google->duration]);
    }
    public function saveorder(){
        $category = ZoneVehicleCategory::with('vehicle_category')->find(request()->category);
        $txn = $this->generateRandomString();
        $totalprice = $category->price+$category->vehicle_category->base;
        $description = request()->details;
        $customer = Partner::find(request()->id);
        $otp = mt_rand(100000,999999);


            $order = Order::create([
                'vehicle'=>$category->vehicle_category_id,
                'from'=>request()->from,
                'to'=>request()->to,
                'money'=>$totalprice,
                'distance'=>request()->distance,
                'txn'=>$txn,
                'status'=>'pending',
                'zone_id'=>$category->zone_id,
                'details'=>$description,
                'quantity'=>request()->quantity,
                'partner_id'=>request()->id,
                 'recipient_name'=>request()->recipientname,
                 'recipient_phone'=>request()->recipientphone,
                 'del_otp'=>$otp
                ]);
                $url = (new PaymentGateWay)->flutterlinkticket($txn,$totalprice,$description,$customer);
                return response()->json(['url'=>$url,'order'=>$order->id,'status'=>"1"]);

    }


    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function getorders(){
        $orders = Order::with('driver')->where('partner_id',request()->id)->get();
        return response()->json(['orders'=>$orders]);
    }
    public function redirectpayment(){
        return (new PaymentGateWay)->redirect();
       }
    public function cancel(){
        $order = Order::find(request()->orderid);
        if($order){
            $order->forceDelete();
            return;
        }else{
            Order::where("txn",request()->txid)->first()->forceDelete();
            return;
        }

    }
}
