<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Semester;
use App\Student;
use Auth;

class StudentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:student');
  }

  public function index()
  {
    $student = Student::findOrFail(Auth::id());
    $semester = Semester::whereDate('start_date', '>=', Carbon::today()->toDateString())->whereDate('end_date', '<>', Carbon::today()->toDateString())->first();

    return view('student.index')->with(compact('student','semester'));
  }
} 