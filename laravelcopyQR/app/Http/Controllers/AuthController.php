<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class AuthController extends Controller
{
   
  protected function validator(array $data)
  {
  return Validator::make($data, [
  'name' => ['required', 'string', 'max:255'],
  'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
  'password' => ['required', 'string', 'min:8', 'confirmed'],
  'QRlink' => ['required', 'numeric', 'min:11']
  ]);
  }




 
  
    public function create(array $data)
    {
      return users::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'QRlink' => $data['QRlink']
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
