<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use App\Models\Country;
use DB;

class CountryController extends Controller
{
    public function country()
   {
    $countries = Country::all();
    return view('country.country', compact('countries'));
   }

   public function create()
   {
      return view('country.create');
   }

   public function storeCountryName(Request $request)
   {
       $request->validate([
           'country_name' => 'required'         
       ]);

       $user = new Country();
       $user->country_name = $request->country_name;
       $user->save();
       return redirect(route('country'));
   }

    public function edit($id)
    {
        $countries = Country::find($id);
        return view('country.edit', compact('countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required'         
        ]);
        $student = Country::find($id);
        $student->country_name = $request->input('country_name');
        $student->update();
        return redirect(route('country'));
    }

    public function destroy(Request $request,$id)  
       { 
          $countries=Country::find($id);
          $countries = DB::delete('delete from countries where id = ?',[$id]);
          return redirect(route('country'));
       } 
}
