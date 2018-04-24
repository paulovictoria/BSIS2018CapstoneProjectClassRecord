<?php

namespace App\Http\Controllers\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Semester; 
use App\Classload;
use App\Matrix;
use Auth;

class FormulaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        $semester = Semester::whereDate('start_date', '>=', Carbon::today()->toDateString())->whereDate('end_date', '<>', Carbon::today()->toDateString())->first();
        $loads = Classload::where('teacher_id', '=', Auth::id())->where('semester_id', '=', $semester->id)->get();
        return view('teacher.subject.index')->with('loads',$loads);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'quiz' => 'required',
                'activity' => 'required',
                'attendance' => 'required',
                'project' => 'required',
                'exam' => 'required',
                'recitation' => 'required',
                'character' =>  'required',
                'classload_id' => 'required',
            ]);

        $formula = new Matrix;
        $formula->quiz = $request->quiz;
        $formula->activity = $request->activity;
        $formula->attendance = $request->attendance;
        $formula->project = $request->project;
        $formula->exam = $request->exam;
        $formula->recitation = $request->recitation;
        $formula->character = $request->character;
        $formula->classload_id = $request->classload_id;
        $formula->save();

        return redirect()->back();
    }

    public function show($id)
    {
        $load = Classload::findOrFail($id);
        return view('teacher.subject.show')->with('load',$load);
    }

    public function edit($id)
    {
        $matrix = Matrix::findOrFail($id);
        return view('teacher.subject.show')->with('matrix',$matrix);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'quiz' => 'required',
                'activity' => 'required',
                'attendance' => 'required',
                'project' => 'required',
                'exam' => 'required',
                'recitation' => 'required',
                'character' =>  'required',
                'classload_id' => 'required',
            ]);

        $formula = Matrix::findOrFail($id);
        $formula->quiz = $request->quiz;
        $formula->activity = $request->activity;
        $formula->attendance = $request->attendance;
        $formula->project = $request->project;
        $formula->exam = $request->exam;
        $formula->recitation = $request->recitation;
        $formula->character = $request->character;
        $formula->classload_id = $request->classload_id;
        $formula->save();

        return redirect()->route('teacher.matrix.show',$formula->classload_id);
    }
}
