<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

class StudentResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/student';

    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function broker()
    {
        return Password::broker('students');
    }

    public function guard()
    {
        return Auth::guard('student');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('reset.student')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
