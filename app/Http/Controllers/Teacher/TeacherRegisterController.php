<?php

namespace App\Http\Controllers\Teacher;

use App\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class TeacherRegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/teacher';

    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function showRegistrationForm()
    {
        return view('register.teacher');
    }

    protected function guard()
    {
        return Auth::guard('teacher');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'teacher_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Teacher::create([
            'teacher_id' => $data['teacher_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
