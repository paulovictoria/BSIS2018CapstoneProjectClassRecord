<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class TeacherForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function showLinkRequestForm()
    {
        return view('email.teacher');
    }

    public function broker()
    {
        return Password::broker('teachers');
    }
}
