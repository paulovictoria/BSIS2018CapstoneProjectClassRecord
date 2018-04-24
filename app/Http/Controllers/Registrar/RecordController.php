<?php

namespace App\Http\Controllers\Registrar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Semester;
use App\Student;
use App\Classload;
use App\Grade;
use App\Sectionload;
use App\Finalgrade;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    public function index()
    {
        $semesters = Semester::all();
        return view('registrar.record.index')->with(compact('semesters'));
    }

    public function show($id)
    {
        $loads = Classload::where('semester_id', '=', $id);
        $secloads = Sectionload::all();
        return view('registrar.record.show')->with(compact('loads','secloads'));
    }

    public function showClass($id)
    {
        $load = Classload::findOrFail($id);
        $secloads = Sectionload::all();
        return view('registrar.record.subject')->with(compact('load','secloads'));
    }

    public function gradeEdit($id, $sid)
    {
        $midterm = Grade::where('classload_id', '=', $id)->where('student_id', '=', $sid)->where('term', '=', 1)->first();
        $midterm->grade_edit = 0;
        $midterm->save();

        $finalterm = Grade::where('classload_id', '=', $id)->where('student_id', '=', $sid)->where('term', '=', 2)->first();
        $finalterm->grade_edit = 0;
        $finalterm->save();

        $final = Finalgrade::where('classload_id', '=', $id)->where('student_id', '=', $sid)->first();
        $final->grade_edit = 0;
        $final->save();

        return redirect()->back();
    }
}
