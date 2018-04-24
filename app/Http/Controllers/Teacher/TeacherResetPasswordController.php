<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

class TeacherResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/teacher';

    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function broker()
    {
        return Password::broker('teachers');
    }

    public function guard()
    {
        return Auth::guard('teacher');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('reset.teacher')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
