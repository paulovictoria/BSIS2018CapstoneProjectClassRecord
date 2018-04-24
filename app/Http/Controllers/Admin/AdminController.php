<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\Subject;
use App\Teacher;
uSe App\Student;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $students = Student::all();
        return view('admin.index')->with(compact('departments','subjects','teachers','students'));
    }
}
