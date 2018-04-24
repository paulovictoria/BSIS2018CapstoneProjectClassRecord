<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class StudentForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function showLinkRequestForm()
    {
        return view('email.student');
    }

    public function broker()
    {
        return Password::broker('students');
    }
}
