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

Route::get('/', function () {
    return view('welcome');
});



Route::get('simple-qr-code', array('as' => 'qrcoderoute', function() {
    return QrCode::size(200)->generate('Food On The Go - FoodCourt QR App ');
}));

Route::get('login',array('as' => 'loginfunc', function() {
return view('login');
}));
Route::post('post-login', 'AuthController@postLogin'); 

Route::get('registration', array('as' => 'registerfunc', function() {
    return view('registration');
}));
Route::post('post-registration', 'AuthController@postRegistration'); 
Route::get('dashboard',  array('as' => 'dashboardfunc', function() {
return view('dashboard');
}));
Route::get('logout', 'AuthController@logout');