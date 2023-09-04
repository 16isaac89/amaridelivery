<?php

namespace App\Http\Controllers\api\v1\vendor\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Requests\VendorRegisterRequest;
use Validator;
use Image;

class RegisterController extends Controller
{

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
        [
        'email' => 'required|email|unique:partners',
        'name'=>'required',
        'password'=>'required|min:6',
        'phone' => 'numeric|unique:partners',
        ],
        [
            'password.min:6'=>'Your password length should be greater than or equal to six characters.',
            'phone.unique'=>'The phone number is already registered with another account, use another one.',
            // 'phone_1.required'=>'The phone number is required',
        ]

    );
if ($validator->fails()) {
return response()->json(['error'=>$validator->errors(),'status'=>'0'], 401);
}
$partner = Partner::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'password'=>bcrypt($request->password),
   ]);
   //$token = $request->user()->createToken($request->token_name);
   //$partner->createToken('amari2023')->plainTextToken();
return response()->json(['success'=>'Success','status'=>'1','user'=>$partner]);

        $data = $request->validated();
        }

        public function savetoken(){
            Partner::find(request()->id)->update([
                'fcm'=>request()->token
            ]);
            return response()->json(['success'=>'Success','status'=>'1'],200);
        }
        public function changeimage(Request $request){
            $partner = Partner::find(request()->id);
            $image = new Image();
            $file = $request->file('image');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $url = \URL::to('/') . '/images/' . $filename;
            $partner->addMediaFromRequest($url)->toMediaCollection('image');
            return response()->json(['user'=>$partner]);
        }
}
