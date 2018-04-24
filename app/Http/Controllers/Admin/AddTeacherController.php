<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;

class AddTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'mname' => 'required',
                'email' => 'required',
                'teacher_id' => 'required',
            ]);

        $teacher = new Teacher;
        $teacher->fname = $request->fname;
        $teacher->mname = $request->mname;
        $teacher->lname = $request->lname;
        $teacher->teacher_id = $request->teacher_id;
        $teacher->email = $request->email;
        $teacher->password = bcrypt('password');
        $teacher->save();

        return redirect()->route('admin.load.index');
    }

}
