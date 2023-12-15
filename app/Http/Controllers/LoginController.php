<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use App\Providers\RouteServiceProvider;
use DB;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function useradd(){
        return view('auth.register');
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'password'=>'required'
        ]);
        $user= new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->mobile=$request->input('mobile');
        $user->password=Hash:: make($request->input('password'));
        $user->save();
        Auth::login($user);
        return redirect('dashboard')->with('message', 'You sucessfully Signup in');

    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard (){
        return view('dashboard');
    }

    public function profile (){
        return view('user-profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //$this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();   
        return redirect(route('index'));
    }

   
}
