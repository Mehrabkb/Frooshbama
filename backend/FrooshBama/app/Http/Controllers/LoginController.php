<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\KavenegarService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->method() == "GET"){
            return view("user.register");
        }elseif($request->method() == "POST"){

        }
    }
    public function sendConfirmCode(Request $request){
        if($request->method() == "POST"){
            $validate = $request->validate([
                "mobile" => "required|numeric"
            ],[
                "mobile.required" => "موبایل الزامی است",
                "mobile.size" => "نمیتواند بیشتر از 11 رقم باشد",
                "mobile.numeric" => "همه ی کارکاکتر ها باید رقم باشند"
            ]);
            if($validate){
                $mobile = $request->input("mobile");
                $code = rand(1000, 9999);
                $msg ="کد فعالسازی شما : $code";
                $sendSms = new KavenegarService( );
                $sms = $sendSms->sendSms([$mobile] , $msg);
                if($sms){
                    return response()->json(["status" => 200]);
                }
                return response()->json(["status" => 201]);

//                $user = User::create([
//                    "mobile" => $mobile,
//                    "user_role_id" => 2
//                ]);

            }
        }
    }
}
