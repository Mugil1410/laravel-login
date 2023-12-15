<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function resetpasswordform(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);

        return view('auth.resetpassword')->with('success', 'User recover successfully.');
        
    }

    public function submitresetpasswordform(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);

        User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
        return redirect(route('index'))->with('message','Your password has been changed sucessfully');
    }
}
