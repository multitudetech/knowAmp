<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\ValidationException;
use App\User;
use DB;

class AuthController extends Controller
{
  public function handleLogin(Request $request)
  {
    $this->validate($request, User::$login_validation_rules);      
    $data = $request->only('email', 'password');
    //check email verification is done or not
    $check_verified = DB::table('users')->where('email', $data['email'])->value('verified');
    if(\Auth::attempt($data)&&$check_verified){
        //$role = DB::table('users')->where('email', $request['email'])->value('role');      
        return redirect('/');
    }
    else{
      $msg = "User name or password is invalid";
      return back()->withInput()->withErrors(['email' => $msg]);   
    }
    
  }

  public function logout()
  {
    \Auth::logout();
    return redirect('/');
  }
}