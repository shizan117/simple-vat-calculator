<?php

namespace App\Http\Controllers;

use App\Models\MerchantAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class MerchantAuthController extends Controller
{
    public static $visitor;
    public function signUpView(){
        return view('merchant.auth.sign-up');
    }
    public function signUp(Request $request){
        MerchantAuth::create(
            [
                'username'=> $request->username,
                'email'=> $request->email,
                'mobile'=> $request->mobile,
                'password'=> Hash::make($request->password),
            ]
        );
        return redirect(route('merchant.signIn'))->with('message','Thanks For Creating an Account. Please Log in.');
    }

    public function MerchantSignIn(){
        return view('merchant.auth.sign-in');
    }

    public function MerchantLogInCheck(Request $request){
        self::$visitor= MerchantAuth::where('email',$request->username)
            ->orWhere('mobile',$request->username)
            ->First();
        if(self::$visitor){
            if (password_verify($request->password,self::$visitor->password)){
                Session::put('visitorId',self::$visitor->id);
              //  Session::put('visitorId',self::$visitor->id);
                Session::put('visitorName',self::$visitor->username);
                Session::put('visitorEmail',self::$visitor->email);
                Session::put('visitorMobile',self::$visitor->mobile);


                return redirect(route('dashboard'));

            }
            else
            {
                return back()->with('message','please use valid password');
            }

        }
        else{
            return back()->with('message','please use valid Email or Mobile Number');
        }
    }

    public function MerchantSignOut(){
        Session::forget('visitorId');

        Session::forget('visitorName');
        Session::forget('visitorEmail');
        Session::forget('visitorMobile');
        return view('merchant.auth.sign-in');
    }


}
