<?php

namespace App\Http\Controllers\Registrar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Semester;
use App\Section;
use App\Sectionload;
use Datatables;

class AddStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    public function index()
    {
        $students = Student::all();
        return view('registrar.student.index')->with(compact('students'));
    }

    public function create()
    {
        $sections = Section::all();
        $semesters = Semester::all();
        return view('registrar.student.create')->with(compact('sections','semesters'));
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->fname = $request->fname;
        $student->mname = $request->mname;
        $student->lname = $request->lname;
        $student->student_id = $request->student_id;
        $student->email = $request->email;
        $student->password = bcrypt('password');
        $student->section_id = $request->section_id;
        $student->semester_id = $request->semester_id;
        $student->save();

        $load = new Sectionload;
        $load->student_id = $student->id;
        $load->section_id = $request->section_id;
        $load->semester_id = $request->semester_id;
        $load->save();


        return redirect()->back();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $sections = Section::all();
        $semesters = Semester::all();
        return view('registrar.student.edit')->with(compact('student','sections','semesters'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $load = Sectionload::where('student_id', '=', $id)->where('section_id', '=', $student->section_id)->where('semester_id', '=', $student->semester_id)->first();

        $load->student_id = $student->id;
        $load->section_id = $request->section_id;
        $load->semester_id = $request->semester_id;
        $load->save();

        $student->fname = $request->fname;
        $student->mname = $request->mname;
        $student->lname = $request->lname;
        $student->student_id = $request->student_id;
        $student->email = $request->email;
        $student->password = bcrypt('password');
        $student->section_id = $request->section_id;
        $student->semester_id = $request->semester_id;
        $student->save();

        return redirect()->route('registrar.student.index');
    }

    public function change($id)
    {
        $student = Student::findOrFail($id);
        $sections = Section::all();
        $semesters = Semester::all();
        return view('registrar.student.change')->with(compact('student','sections','semesters'));
    }

    public function changeUpdate(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->semester_id = $request->semester_id;
        $student->section_id = $request->section_id;
        $student->save();

        $load = new Sectionload;
        $load->student_id = $id;
        $load->section_id = $request->section_id;
        $load->semester_id = $request->semester_id;
        $load->save();

        return redirect()->route('registrar.student.index');
    }

    public function getStudents()
    {
        $students = Student::all();
        return Datatables::of($students)
            ->addColumn('action', function($students){
                return '<div class="row">
                    <div class="col-md-4 mx-0">
                        <a href="'.route('registrar.student.edit',$students->id).'" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-md-4 mx-0">
                        <a href="'.route('registrar.student.change',$students->id).'" class="btn btn-success btn-block">Update</a>
                    </div>
                </div>';
            })
            ->make(true);
    }
}
