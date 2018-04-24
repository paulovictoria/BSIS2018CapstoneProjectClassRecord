<?php

namespace App\Http\Controllers\Guardian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class GuardianLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:guardian')->except('logout');
	}

  public function showLoginForm()
  {
  	return view('login.guardian');
  }

  public function login(Request $request)
  {
  	$this->validate($request, [
  		'email' => 'required|email',
  		'password' => 'required|min:6',
  	]);

  	if (Auth::guard('guardian')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
  		return redirect()->intended(route('guardian.dashboard'));
  	}
  	return redirect()->back()->withInput($request->only('email','remember'));
  }

  public function logout()
  {
    Auth::guard('guardian')->logout();
    return redirect('/');
  }
}
