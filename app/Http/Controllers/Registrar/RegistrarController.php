<?php

namespace App\Http\Controllers\Registrar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\Section;
use App\Teacher;
uSe App\Student;

class RegistrarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        $students = Student::all();
        return view('registrar.index')->with(compact('departments','sections','teachers','students'));
    }
}
