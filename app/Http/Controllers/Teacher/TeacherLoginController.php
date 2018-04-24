<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TeacherLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:teacher')->except('logout');
	}

  public function showLoginForm()
  {
  	return view('login.teacher');
  }

  public function login(Request $request)
  {
  	$this->validate($request, [
  		'teacher_id' => 'required',
  		'password' => 'required|min:6',
  	]);

  	if (Auth::guard('teacher')->attempt(['teacher_id'=>$request->teacher_id, 'password'=>$request->password], $request->remember)) {
  		return redirect()->intended(route('teacher.dashboard'));
  	}
  	return redirect()->back()->withInput($request->only('teacher_id','remember'));
  }

  public function logout()
  {
    Auth::guard('teacher')->logout();
    return redirect('/');
  }
}
