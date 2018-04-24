<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

class GuardianResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/guardian';

    public function __construct()
    {
        $this->middleware('guest:guardian');
    }

    public function broker()
    {
        return Password::broker('guardians');
    }

    public function guard()
    {
        return Auth::guard('guardian');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('reset.guardian')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
