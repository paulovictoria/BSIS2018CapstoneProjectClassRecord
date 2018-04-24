<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class GuardianForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:guardian');
    }

    public function showLinkRequestForm()
    {
        return view('email.guardian');
    }

    public function broker()
    {
        return Password::broker('guardians');
    }
}
