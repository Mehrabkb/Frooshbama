<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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
                "mobile" => "required|size:11|numeric"
            ],[
                "mobile.required" => "موبایل الزامی است",
                "mobile.max" => "نمیتواند بیشتر از 11 رقم باشد",
                "mobile.numeric" => "همه ی کارکاکتر ها باید رقم باشند"
            ]);
            if($validate){
                $mobile = $request->input("mobile");
                $user = User::create([
                    "mobile" => $mobile,
                    "user_role_id" => 2 
                ]);
                
            }
        }
    }
}
