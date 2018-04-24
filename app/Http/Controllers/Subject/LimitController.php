<?php

namespace App\Http\Controllers\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Limit;
use App\Classload;

class LimitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
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
                'term' => 'required',
                'classload_id' => 'required',
            ]);
        $limit = new Limit;
        $limit->quiz = $request->quiz;
        $limit->activity = $request->activity;
        $limit->attendance = $request->attendance;
        $limit->project = $request->project;
        $limit->exam = $request->exam;
        $limit->recitation = $request->recitation;
        $limit->character = $request->character;
        $limit->term = $request->term;
        $limit->classload_id = $request->classload_id;
        $limit->save();

        return redirect()->back();
    }

    public function showLimit($id, $lid)
    {
        $load = Classload::findOrFail($id);
        return view('teacher.limit.show')->with(compact('load','lid'));
    }

    public function edit($id)
    {
        $limit = Limit::findOrFail($id);
        return view('teacher.limit.edit')->with('limit',$limit);
    }

    public function update(Request $request, $id)
    {
        $limit = Limit::findOrFail($id);
        $limit->quiz = $request->quiz;
        $limit->activity = $request->activity;
        $limit->exam = $request->exam;
        $limit->project = $request->project;
        $limit->attendance = $request->attendance;
        $limit->recitation = $request->recitation;
        $limit->character = $request->character;
        $limit->save();

        return redirect()->route('teacher.limit.term',[$limit->classload_id, $limit->term]);
    }

    public function destroy($id)
    {
        //
    }
}
