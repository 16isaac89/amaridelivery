<?php

namespace App\Http\Controllers\api\v1\vendor\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class ProfileController extends Controller
{
    public function changepwd(){
        $newpwd = request()->newpwd;
        $oldpwd = request()->oldpwd;
        $partner = Partner::find(request()->id);
        if (Hash::make($newpwd) === $partner->password) {
            $partner->update([
                'password'=>bcrypt(request()->newpwd),
                ]);
            return response()->json(['message'=>'Password updated succesfully','status'=>1]);
          }

        return response()->json(['message'=>'Failed to update password.','status'=>0]);
    }
    public function profileedit(){
        Partner::find(request()->id)->update([
        'name'=>request()->name,
        'email'=>request()->email,
        //'address'=>request()->address,
        //'phone'=>request()->phone,
        //'description'=>request()->description,
        ]);
        $user = Partner::find(request()->id);
        return response()->json(['message'=>'Profile updated successfully','user'=>$user]);
    }
    public function editpassword(){
        $partner = Partner::find(request()->id);
        if (\Hash::check(request()->old, $partner->password)) {
            $partner->update([
                'password'=>bcrypt(request()->password),
            ]);
            return response()->json(['message'=>'Password updated successfully']);
        }else{
            return response()->json(['message'=>'Your old password and current password do not match.']);
        }

    }
    public function editphone(){
        Partner::find(request()->id)->update([
            'phone'=>request()->phone,
        ]);
        $user = Partner::find(request()->id);
        return response()->json(['message'=>'Phonenumber updated successfully','user'=>$user]);
    }

}
