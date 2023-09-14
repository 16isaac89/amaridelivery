<?php

namespace App\Http\Controllers\api\v1\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\SystemSetting;


class OrderController extends Controller
{
   public function neworders(){
$orders = Order::with('partner')->where(['status'=>'pending','driver_id'=>request()->id])->get();
return response()->json(['orders'=>$orders]);
   }
   public function activeorders(){
    $orders = Order::with('partner')->where(['status'=>'assigned','driver_id'=>request()->id])->get();
    return response()->json(['orders'=>$orders]);
   }
   public function history(){
    $orders = Order::with('partner')->where(['status'=>'completed','driver_id'=>request()->id])->get();
    return response()->json(['orders'=>$orders]);
   }


   public function acceptorder(){
     Order::find(request()->id)->update([
        'status'=>'assigned'
    ]);
    $orders = Order::with('partner')->where(['status'=>'pending','driver_id'=>request()->driver])->get();
    $activeorders = Order::with('partner')->where(['status'=>'assigned','driver_id'=>request()->id])->get();
    return response()->json(['orders'=>$orders,'activeorders'=>$activeorders]);
   }
   public function rejectorder(){
    $order = Order::find(request()->id)->update([
        'status'=>'pending',
        'driver_id'=>""
    ]);
    $orders = Order::with('partner')->where(['status'=>'pending','driver_id'=>request()->driver])->get();
    return response()->json(['orders'=>$orders]);
   }

   public function completeorder(){
    $order = Order::with('driver')->find(request()->id);
    $order->update([
        'status'=>'completed',
    ]);
    $settings = SystemSetting::where('name','rider_percentage')->first()->value;
    $rider = intval($settings)/100;
    $earning = $rider*intval($order->money);
    $user = $order->driver;
    $user->deposit($earning);
    $orders = Order::with('partner')->where(['status'=>'assigned','driver_id'=>$order->driver_id])->get();
    $history = Order::with('partner')->where(['status'=>'completed','driver_id'=>$order->driver_id])->get();
    return response()->json(['orders'=>$orders,'history'=>$history]);
   }


}
