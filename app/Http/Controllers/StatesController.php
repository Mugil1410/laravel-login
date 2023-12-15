<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use App\Models\Country;
use App\Models\State;
use DB;

class StatesController extends Controller
{
    public function state()
   {
    $states = State::all();
    return view('state.state',compact('states'));
   }

   public function create()
   {
    $countries = Country::select('country_name')->get();
    //return view('countries', compact('countries'));
    $states = State::all();
    return view('state.create', compact('states','countries'));
   }

   public function storeStateName(Request $request)
   {
       $request->validate([
           'country_name' => 'required',
           'state_name' => 'required'         
       ]);

       $user = new State();
       $user->country_name = $request->country_name;
       $user->state_name = $request->state_name;
       $user->save();
       return redirect(route('state'));
   }

    public function edit($id)
    {
        $states = State::find($id);
        return view('state.edit', compact('states'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state_name' => 'required'         
        ]);
        $student = State::find($id);
        $student->state_name = $request->state_name;
        $student->update();
        return redirect(route('state'));
    }

    public function destroy(Request $request,$id)  
       { 
          $states=State::find($id);
          $states = DB::delete('delete from states where id = ?',[$id]);
          return redirect(route('state'));
       } 
}
