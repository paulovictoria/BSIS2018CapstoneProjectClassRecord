<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Semester;
use App\Teacher;
use Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        $teacher = Teacher::findOrFail(Auth::id());
    	$semester = Semester::whereDate('start_date', '>=', Carbon::today()->toDateString())->whereDate('end_date', '<>', Carbon::today()->toDateString())->first();
        return view('teacher.index')->with(compact('teacher','semester'));
    }
}
