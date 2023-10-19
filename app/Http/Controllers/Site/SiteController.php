<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Controllers\helpers\PaymentGateWay;

class SiteController extends Controller
{
    public function index(){
        return view('site.index');
    }
    public function about(){
        return view('site.about');
    }
    public function services(){
        return view('site.services');
    }
    public function contact(){
        return view('site.contact');
    }
    public function partner(){
        return view('site.partner');
    }
    public function privacy(){
        return view('site.privacy');
    }
    public function partnerregister(){
        Partner::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'address'=>request()->address,
            'phone'=>request()->phone,
            'password'=>bcrypt('123456789')
        ]);
        return response()->json(['message'=>'Your account has been created awaiting verification.']);
    }
    public function paymentdone(){
        return (new PaymentGateWay)->redirect();
       }

}
