<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class RegistrarForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:registrar');
    }

    public function showLinkRequestForm()
    {
        return view('email.registrar');
    }

    public function broker()
    {
        return Password::broker('registrars');
    }
}
