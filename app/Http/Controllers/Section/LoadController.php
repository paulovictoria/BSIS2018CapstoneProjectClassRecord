<?php

namespace App\Http\Controllers\Section;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Student;
use Datatables;

class LoadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        return view('section.load.show')->with('section',$section);
    }

    public function getStudents($id)
    {
        $section = Section::findOrFail($id);
        $students = $section->students()->get();
        return Datatables::of($students)
            ->addColumn('action', function($students){
                return '<div class="row mx-0">
                    <div class="col-md-6">
                        <form method="POST" action="'.route('registrar.load.destroy',[$students->id]).'" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="'.csrf_token().'">
                            <input name="_method" type="hidden" value="DELETE">
                            <input class="btn btn-danger btn-block" type="submit" value="Unload">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="'.route('registrar.print.slip',$students->id).'" class="btn btn-info btn-block">Print GradeSlip</a>
                    </div>
                </div>';
            })
            ->make(true);
    }
}
