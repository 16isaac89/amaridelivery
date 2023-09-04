<?php

namespace App\Http\Controllers\api\v1\driver\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Driver;

class RegisterController extends Controller
{
    public function register(Request $request) {


        $validator = Validator::make($request->all(),
        [
        'email' => 'required|email|unique:drivers',
        'fullname'=>'required',
        'password'=>'required|min:6',
        'phone_1' => 'numeric|unique:drivers',
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
$partner = Driver::create([
    'fullname'=>$request->fullname,
    'email'=>$request->email,
    'phone_1'=>$request->phone_1,
    'secondname'=>$request->secondname,
    'password'=>bcrypt($request->password),
   ]);
   //$token = $request->user()->createToken($request->token_name);
   //$partner->createToken('amari2023')->plainTextToken();
return response()->json(['success'=>'Success','status'=>'1','user'=>$partner]);

        $data = $request->validated();
        }

        public function savetoken(){
            Driver::find(request()->id)->update([
                'fcm'=>request()->token
            ]);
            return response()->json(['success'=>'Success','status'=>'1'],200);
        }
}
