<?php

namespace App\Http\Controllers\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Datatables;
use App\Department;
use App\Teacher;
use App\Subject;
use App\Section;
use App\Semester;
use App\Classload;

class LoadTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.load.index');
    }

    public function create()
    {
        $departments = Department::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $sections = Section::all();
        $semesters = Semester::all();
        return view('admin.load.create')->with(compact('departments','teachers','subjects','sections','semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
            'semester_id' => 'required'
        ]);

        $classload = new Classload;
        $classload->department_id = $request->department_id;
        $classload->teacher_id = $request->teacher_id;
        $classload->subject_id = $request->subject_id;
        $classload->section_id = $request->section_id;
        $classload->semester_id = $request->semester_id;
        $classload->save();

        return redirect('/admin/load/');
    }

    public function show($id)
    {
        $semester = Semester::whereDate('start_date', '>=', Carbon::today()->toDateString())->whereDate('end_date', '<>', Carbon::today()->toDateString())->first();
        $teachers = Classload::where('teacher_id','=',$id)->where('semester_id', '=', $semester->id)->get();
        $teacher = Teacher::findOrFail($id);
        return view('admin.load.show')->with(compact('teachers','teacher'));
    }

    public function edit($id)
    {
        $classload = Classload::findOrFail($id);
        $teachers= Classload::all();
        return view('admin.load.edit')->with(compact('classload', 'loads'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'department_id' => 'required',
            'semester_id' => 'required'
        ]);

        $classload = Classload::findOrFail($id);
        $classload->teacher_id = $request->teacher_id;
        $classload->subject_id = $request->subject_id;
        $classload->department_id = $request->department_id;
        $classload->section_id = $request->section_id;
        $classload->semester_id = $request->semester_id;
        $classload->save();

        return redirect('/admin/load/');
    }

    public function destroy($id)
    {
        $classload = Classload::findOrFail($id);
        $classload->delete();
        return redirect('/admin/load/');
    }

    public function getClassload()
    {
        $teachers = Teacher::all();
        return Datatables::of($teachers)
            ->addColumn('action', function($teachers){
                return '<div class="row">
                    <div class="col mx-0">
                        <a href="'.route('admin.load.show',[$teachers->id]).'" class="btn btn-success btn-block">Show</a>
                    </div>
                </div>';
            })
            ->make(true);
    }

}
