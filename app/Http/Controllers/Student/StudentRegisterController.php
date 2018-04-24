<?php

namespace App\Http\Controllers\Student;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class StudentRegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/student';

    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function showRegistrationForm()
    {
        return view('register.student');
    }

    protected function guard()
    {
        return Auth::guard('student');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'student_id' => 'required|integer|unique:students',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Student::create([
            'student_id' => $data['student_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
