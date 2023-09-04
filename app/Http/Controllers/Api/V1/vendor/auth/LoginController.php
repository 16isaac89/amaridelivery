<?php

namespace App\Http\Controllers\api\v1\vendor\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VendorLoginRequest;
use App\Models\Partner;
use Hash;

class LoginController extends Controller
{
    public function login(VendorLoginRequest $request){
        $credentials = $request->validated();
        //$fieldType = filter_var($credentials['phone'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $partner = Partner::where('phone', $request->phone)->first();
        //return response()->json(['message'=>request()->all(),"partner"=>$partner]);
    if($partner !== null){
        if (!Hash::check($request->password, $partner->password)) {
            return response()->json(["message"=>'Wrong username or password','status'=>'0'], 422);
        }
        //$token =  $partner->createToken('1#amaridelivery2022')->plainTextToken();
        return response()->json(['customer'=>$partner,"message"=>"Successfuly logged in..",'status'=>'1'], 200);
    }else{
        return response()->json(["message"=>'A user with these credentials does not exist','status'=>'0'], 422);
    }
    }
    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response('',204);
    }
}
