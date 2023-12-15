<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//login
Route::get('/',[App\Http\Controllers\LoginController::class,'show'])->name('index');
Route::post('/login',[App\Http\Controllers\LoginController::class,'authenticate']);

//signup
Route::get('/register',[App\Http\Controllers\LoginController::class,'useradd'])->name('add');
Route::post('/useradd',[App\Http\Controllers\LoginController::class,'create'])->name('create');

//google auth
Route::get('/auth/google',[App\Http\Controllers\GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/call-back',[App\Http\Controllers\GoogleAuthController::class,'callbackgoogle']);

//Forgot-password
Route::get('/forgot-password',[App\Http\Controllers\ForgotpasswordController::class,'forgotpasswordform'])->name('forgot.password.get');
Route::get('/reset-password',[App\Http\Controllers\ForgotpasswordController::class,'resetpasswordform'])->name('reset.password.get');
Route::post('/forgot-password',[App\Http\Controllers\ForgotpasswordController::class,'submitresetpasswordform'])->name('reset.password.post');

//logout
Route::post('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');


//dashboard and user profile
Route::get('/dashboard',[App\Http\Controllers\LoginController::class,'dashboard'])->name('dashboard');
Route::get('/user-profile',[App\Http\Controllers\LoginController::class,'profile'])->name('user-profile');


//country
Route::get('/country', [App\Http\Controllers\CountryController::class,'country'])->name('country');
Route::get('/addcountry', [App\Http\Controllers\CountryController::class,'create'])->name('addcountry');
Route::post('/store-country-name',[App\Http\Controllers\CountryController::class,'storeCountryName'])->name('storeCountryName');
Route::get('edit-country/{id}', [App\Http\Controllers\CountryController::class, 'edit'])->name('country.edit');
Route::put('update-country/{id}', [App\Http\Controllers\CountryController::class, 'update'])->name('country.update');
Route::get('/country/{id}', [App\Http\Controllers\CountryController::class, 'destroy'])->name('country.delete');

//state
Route::get('/state', [App\Http\Controllers\StatesController::class,'state'])->name('state');
Route::get('/addstate', [App\Http\Controllers\StatesController::class,'create'])->name('addstate');
Route::post('/store-state-name',[App\Http\Controllers\StatesController::class,'storeStateName'])->name('storeStateName');
Route::get('edit-state/{id}', [App\Http\Controllers\StatesController::class, 'edit'])->name('state.edit');
Route::put('update-state/{id}', [App\Http\Controllers\StatesController::class, 'update'])->name('state.update');
Route::get('/state/{id}', [App\Http\Controllers\StatesController::class, 'destroy'])->name('state.delete');

