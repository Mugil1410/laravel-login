<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgotpasswordform(){
        return view('auth.forgotpassword');
    }

    public function submitforgotpasswordform(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);
        $token=str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
        Mail::send('email.forgotPassword',['token'=>$token],function($message) use ($request){
            $message->to($request)->input('email');
            $message->subject('Reset Password Notification');

        });
        return back()-with('message','check your email we send password reset to out register mail id');
    }

    public function resetpasswordform(){
        return view('auth.resetpassword',['token'=>$token]);
        
    }

    public function submitresetpasswordform(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);

        $password_reset_request=DB::table('password_resets')
        ->where('email',$request->input('email'))
        ->where('token',$request->token)
        ->first();
        if(!empty($password_reset_request)){
            return back()->with('error','Invalid Token!');
        }
        User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
        DB::table('password_resets')->where('email',$request->email)->delete();
        return redirect('/')->with('message','Your password has been changed sucessfully');

    }
}
