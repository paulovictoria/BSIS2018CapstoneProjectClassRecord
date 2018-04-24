<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}

  public function showLoginForm()
  {
  	return view('login.admin');
  }

  public function login(Request $request)
  {
  	$this->validate($request, [
  		'username' => 'required',
  		'password' => 'required|min:6',
  	]);

  	if (Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->remember)) {
  		return redirect()->intended(route('admin.dashboard'));
  	}
  	return redirect()->back()->withInput($request->only('username','remember'));
  }

  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect('/');
  }
}
