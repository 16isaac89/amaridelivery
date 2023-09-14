<?php

namespace App\Http\Controllers\api\v1\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\SystemSetting;
use App\Models\Driver;

class ProfileController extends Controller
{
    public function balance(){
        $user = Driver::find(request()->id);
        $orders = Order::with('partner')->where(['status'=>'completed','driver_id'=>request()->id])->get();
        $driverpercentage = SystemSetting::where('name','rider_percentage')->first()->value;
        return response()->json(['balance'=>$user->balance,'orders'=>$orders,'driverpercentage'=>$driverpercentage]);
    }
}
