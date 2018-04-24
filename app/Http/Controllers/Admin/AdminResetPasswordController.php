<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

class AdminResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('reset.admin')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
