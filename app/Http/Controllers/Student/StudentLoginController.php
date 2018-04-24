<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudentLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:student')->except('logout');
	}

  public function showLoginForm()
  {
  	return view('login.student');
  }

  public function login(Request $request)
  {
  	$this->validate($request, [
  		'student_id' => 'required',
  		'password' => 'required|min:6',
  	]);

  	if (Auth::guard('student')->attempt(['student_id'=>$request->student_id, 'password'=>$request->password], $request->remember)) {
  		return redirect()->intended(route('student.dashboard'));
  	}
  	return redirect()->back()->withInput($request->only('student_id','remember'));
  }

  public function logout()
  {
    Auth::guard('student')->logout();
    return redirect('/');
  }
}
