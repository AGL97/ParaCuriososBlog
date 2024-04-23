<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
  public function login():View{
    return view('login');
  }

  public function verify(Request $request)
  {
    try {
      $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
      ]);

      if(!Auth::attempt($request->only(['email','password'])))
      {              
        throw ValidationException::withMessages([
          'email' => 'The provided credentials do not match our records.'
        ]);
      }           
      return redirect()->route('admin.index');
    }catch (\Exception $e) {
      return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');            
    }        
        
  }
}
