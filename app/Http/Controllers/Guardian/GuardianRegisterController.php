<?php

namespace App\Http\Controllers\Guardian;

use App\Guardian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class GuardianRegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/guardian';

    public function __construct()
    {
        $this->middleware('guest:guardian');
    }

    public function showRegistrationForm()
    {
        return view('register.guardian');
    }

    protected function guard()
    {
        return Auth::guard('guardian');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Guardian::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
