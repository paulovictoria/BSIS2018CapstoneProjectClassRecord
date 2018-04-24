<?php

namespace App\Http\Controllers\Registrar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class RegistrarLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:registrar')->except('logout');
	}

  public function showLoginForm()
  {
  	return view('login.registrar');
  }

  public function login(Request $request)
  {
  	$this->validate($request, [
  		'username' => 'required',
  		'password' => 'required|min:6',
  	]);

  	if (Auth::guard('registrar')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->remember)) {
  		return redirect()->intended(route('registrar.dashboard'));
  	}
  	return redirect()->back()->withInput($request->only('username','remember'));
  }

  public function logout()
  {
    Auth::guard('registrar')->logout();
    return redirect('/');
  }
}
