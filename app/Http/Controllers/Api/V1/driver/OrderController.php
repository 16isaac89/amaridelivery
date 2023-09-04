<?php

namespace App\Http\Controllers\api\v1\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
   public function neworders(){
$orders = Order::with('partner')->where(['status'=>'pending','driver_id'=>request()->id])->get();
return response()->json(['orders'=>$orders]);
   }
   public function activeorders(){
    $orders = Order::where(['status'=>'assigned','driver_id'=>request()->id])->get();
    return response()->json(['orders'=>$orders]);
   }
   public function history(){
    $orders = Order::where(['status'=>'completed','driver_id'=>request()->id])->get();
    return response()->json(['orders'=>$orders]);
   }


   public function acceptorder(){
     Order::find(request()->id)->update([
        'status'=>'assigned'
    ]);
    $orders = Order::with('partner')->where(['status'=>'pending','driver_id'=>request()->driver])->get();
    return response()->json(['orders'=>$orders]);
   }
   public function rejectorder(){
    $order = Order::find(request()->id)->update([
        'status'=>'pending',
        'driver_id'=>""
    ]);
    $orders = Order::with('partner')->where(['status'=>'pending','driver_id'=>request()->driver])->get();
    return response()->json(['orders'=>$orders]);
   }


}
