<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

class RegistrarResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/registrar';

    public function __construct()
    {
        $this->middleware('guest:registrar');
    }

    public function broker()
    {
        return Password::broker('registrars');
    }

    public function guard()
    {
        return Auth::guard('registrar');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('reset.registrar')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
