<?php

namespace App\Http\Controllers\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grade;
use App\Matrix;
use App\Classload;
use App\Midterm;
use App\Finalterm;
use App\Finalgrade;
use Auth;


class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'quiz' => 'required',
                'activity' => 'required',
                'exam' => 'required',
                'project' => 'required',
                'attendance' => 'required',
                'recitation' => 'required',
                'character' => 'required',
                'term' => 'required',
                'classload_id' => 'required',
                'student_id' => 'required',
            ]);

        $grade = new Grade;
        $grade->quiz = $request->quiz;
        $grade->activity = $request->activity;
        $grade->exam = $request->exam;
        $grade->project = $request->project;
        $grade->attendance = $request->attendance;
        $grade->recitation = $request->recitation;
        $grade->character = $request->character;
        $grade->term = $request->term;
        $grade->classload_id = $request->classload_id;
        $grade->student_id = $request->student_id;
        $grade->grade_edit = 1;
        $grade->save();

        $load = Classload::findOrFail($request->classload_id);
        foreach ($load->limits->where('term', '=', $request->term)->where('classload_id', '=', $request->classload_id) as $limit) 
        {
            if ($request->term == 1)
            {
                $midterm = new Midterm;

                $term = round(
                    ($request->quiz/$limit->quiz*50+50)*($load->matrix->quiz/100)+
                    ($request->activity/$limit->activity*50+50)*($load->matrix->activity/100)+
                    ($request->exam/$limit->exam*50+50)*($load->matrix->exam/100)+
                    ($request->project/$limit->project*50+50)*($load->matrix->project/100)+
                    ($request->attendance/$limit->attendance*50+50)*($load->matrix->attendance/100)+
                    ($request->recitation/$limit->recitation*50+50)*($load->matrix->recitation/100)+
                    ($request->character/$limit->character*50+50)*($load->matrix->character/100),2
                );

                switch($term){

                    case($term >= 0.00 and $term <= 74.99):
                        $equiv = 5.00;
                        break;

                    case($term >= 75.00 and $term <= 76.99):
                        $equiv = 3.00;
                        break;

                    case($term >= 77.00 and $term <= 79.99):
                        $equiv = 2.75;
                        break;

                    case($term >= 80.00 and $term <= 82.99):
                        $equiv = 2.50;
                        break;

                    case($term >= 83.00 and $term <= 85.99):
                        $equiv = 2.25;
                        break;

                    case($term >= 86.00 and $term <= 88.99):
                        $equiv = 2.00;
                        break;

                    case($term >= 89.00 and $term <= 91.99):
                        $equiv = 1.75;
                        break;

                    case($term >= 92.00 and $term <= 94.99):
                        $equiv = 1.50;
                        break;

                    case($term >= 95.00 and $term <= 97.99):
                        $equiv = 1.25;
                        break;

                    case($term >= 98.00 and $term <= 100.00):
                        $equiv = 1.00;
                        break;
                };

                $midterm->grade = $term;
                $midterm->equiv = $equiv;
                $midterm->classload_id = $request->classload_id;
                $midterm->student_id = $request->student_id;
                $midterm->save();
            }
            elseif ($request->term == 2) 
            {
                $finals = new Finalterm;

                $term = round(
                    ($request->quiz/$limit->quiz*50+50)*($load->matrix->quiz/100)+
                    ($request->activity/$limit->activity*50+50)*($load->matrix->activity/100)+
                    ($request->exam/$limit->exam*50+50)*($load->matrix->exam/100)+
                    ($request->project/$limit->project*50+50)*($load->matrix->project/100)+
                    ($request->attendance/$limit->attendance*50+50)*($load->matrix->attendance/100)+
                    ($request->recitation/$limit->recitation*50+50)*($load->matrix->recitation/100)+
                    ($request->character/$limit->character*50+50)*($load->matrix->character/100),2
                );

                switch($term){

                    case($term >= 0.00 and $term <= 74.99):
                        $equiv = 5.00;
                        break;

                    case($term >= 75.00 and $term <= 76.99):
                        $equiv = 3.00;
                        break;

                    case($term >= 77.00 and $term <= 79.99):
                        $equiv = 2.75;
                        break;

                    case($term >= 80.00 and $term <= 82.99):
                        $equiv = 2.50;
                        break;

                    case($term >= 83.00 and $term <= 85.99):
                        $equiv = 2.25;
                        break;

                    case($term >= 86.00 and $term <= 88.99):
                        $equiv = 2.00;
                        break;

                    case($term >= 89.00 and $term <= 91.99):
                        $equiv = 1.75;
                        break;

                    case($term >= 92.00 and $term <= 94.99):
                        $equiv = 1.50;
                        break;

                    case($term >= 95.00 and $term <= 97.99):
                        $equiv = 1.25;
                        break;

                    case($term >= 98.00 and $term <= 100.00):
                        $equiv = 1.00;
                        break;
                };

                $finals->grade = $term;
                $finals->equiv = $equiv;
                $finals->classload_id = $request->classload_id;
                $finals->student_id = $request->student_id;
                $finals->save();
            }
        }
        

        return redirect()->back();
    }

    public function showTerm($id, $tid)
    {
        $load = Classload::findOrFail($id);
        return view('teacher.grade.show')->with(compact('load', 'tid'));
    }

    public function show($id)
    {
        $load = Classload::findOrFail($id);
        $midterms = Midterm::all();
        $finalterms = Finalterm::all();
        return view('teacher.grade.student')->with(compact('load','midterms','finalterms'));
    }

    public function storeGrade(Request $request)
    {
        // $midterm = new Midterm;
        // $midterm->grade = $request->midterm;
        // $midterm->equiv = $request->mideq;
        // $midterm->classload_id = $request->classload_id;
        // $midterm->student_id = $request->student_id;
        // $midterm->save();

        // $finals = new Finalterm;
        // $finals->grade = $request->finals;
        // $finals->equiv = $request->fineq;
        // $finals->classload_id = $request->classload_id;
        // $finals->student_id = $request->student_id;
        // $finals->save();

        $finalgrade = new Finalgrade;
        $finalgrade->midterm = $request->midterm;
        $finalgrade->final = $request->finals;
        $finalgrade->finalgrade = $request->finalgrade;
        $finalgrade->equiv = $request->fgeq;
        $finalgrade->remarks = $request->remarks;
        $finalgrade->classload_id = $request->classload_id;
        $finalgrade->student_id = $request->student_id;
        $finalgrade->grade_edit = 1;
        $finalgrade->save();

        return redirect()->route('teacher.grade.show',$request->classload_id);
    }

    public function UpdateGrade(Request $request, $id)
    {
        $finalgrade = Finalgrade::findOrFail($id);
        $finalgrade->midterm = $request->midterm;
        $finalgrade->final = $request->finals;
        $finalgrade->finalgrade = $request->finalgrade;
        $finalgrade->equiv = $request->fgeq;
        $finalgrade->remarks = $request->remarks;
        $finalgrade->classload_id = $request->classload_id;
        $finalgrade->student_id = $request->student_id;
        $finalgrade->grade_edit = 1;
        $finalgrade->save();

        return redirect()->route('teacher.grade.show',$request->classload_id); 
    }

    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('teacher.grade.edit')->with('grade',$grade);
    }

    public function update(Request $request, $id)
    {

        $grade = Grade::findOrFail($id);
        $grade->quiz = $request->quiz;
        $grade->activity = $request->activity;
        $grade->exam = $request->exam;
        $grade->project = $request->project;
        $grade->attendance = $request->attendance;
        $grade->recitation = $request->recitation;
        $grade->character = $request->character;
        $grade->grade_edit = 1;
        $grade->save();

        $load = Classload::findOrFail($grade->classload_id);
        foreach ($load->limits->where('term', '=', $grade->term)->where('classload_id', '=', $grade->classload_id) as $limit) 
        {
            if ($grade->term == 1)
            {
                $midterm = Midterm::where('classload_id', '=', $grade->classload_id)->where('student_id', '=', $grade->student_id)->first();

                $term = round(
                    ($grade->quiz/$limit->quiz*50+50)*($load->matrix->quiz/100)+
                    ($grade->activity/$limit->activity*50+50)*($load->matrix->activity/100)+
                    ($grade->exam/$limit->exam*50+50)*($load->matrix->exam/100)+
                    ($grade->project/$limit->project*50+50)*($load->matrix->project/100)+
                    ($grade->attendance/$limit->attendance*50+50)*($load->matrix->attendance/100)+
                    ($grade->recitation/$limit->recitation*50+50)*($load->matrix->recitation/100)+
                    ($grade->character/$limit->character*50+50)*($load->matrix->character/100),2
                );

                switch($term){

                    case($term >= 0.00 and $term <= 74.99):
                        $equiv = 5.00;
                        break;

                    case($term >= 75.00 and $term <= 76.99):
                        $equiv = 3.00;
                        break;

                    case($term >= 77.00 and $term <= 79.99):
                        $equiv = 2.75;
                        break;

                    case($term >= 80.00 and $term <= 82.99):
                        $equiv = 2.50;
                        break;

                    case($term >= 83.00 and $term <= 85.99):
                        $equiv = 2.25;
                        break;

                    case($term >= 86.00 and $term <= 88.99):
                        $equiv = 2.00;
                        break;

                    case($term >= 89.00 and $term <= 91.99):
                        $equiv = 1.75;
                        break;

                    case($term >= 92.00 and $term <= 94.99):
                        $equiv = 1.50;
                        break;

                    case($term >= 95.00 and $term <= 97.99):
                        $equiv = 1.25;
                        break;

                    case($term >= 98.00 and $term <= 100.00):
                        $equiv = 1.00;
                        break;
                };

                $midterm->grade = $term;
                $midterm->equiv = $equiv;
                $midterm->classload_id = $grade->classload_id;
                $midterm->student_id = $grade->student_id;
                $midterm->save();
            }
            elseif ($grade->term == 2) 
            {
                $finals = Finalterm::where('classload_id', '=', $grade->classload_id)->where('student_id', '=', $grade->student_id)->first();;

                $term = round(
                    ($grade->quiz/$limit->quiz*50+50)*($load->matrix->quiz/100)+
                    ($grade->activity/$limit->activity*50+50)*($load->matrix->activity/100)+
                    ($grade->exam/$limit->exam*50+50)*($load->matrix->exam/100)+
                    ($grade->project/$limit->project*50+50)*($load->matrix->project/100)+
                    ($grade->attendance/$limit->attendance*50+50)*($load->matrix->attendance/100)+
                    ($grade->recitation/$limit->recitation*50+50)*($load->matrix->recitation/100)+
                    ($grade->character/$limit->character*50+50)*($load->matrix->character/100),2
                );

                switch($term){

                    case($term >= 0.00 and $term <= 74.99):
                        $equiv = 5.00;
                        break;

                    case($term >= 75.00 and $term <= 76.99):
                        $equiv = 3.00;
                        break;

                    case($term >= 77.00 and $term <= 79.99):
                        $equiv = 2.75;
                        break;

                    case($term >= 80.00 and $term <= 82.99):
                        $equiv = 2.50;
                        break;

                    case($term >= 83.00 and $term <= 85.99):
                        $equiv = 2.25;
                        break;

                    case($term >= 86.00 and $term <= 88.99):
                        $equiv = 2.00;
                        break;

                    case($term >= 89.00 and $term <= 91.99):
                        $equiv = 1.75;
                        break;

                    case($term >= 92.00 and $term <= 94.99):
                        $equiv = 1.50;
                        break;

                    case($term >= 95.00 and $term <= 97.99):
                        $equiv = 1.25;
                        break;

                    case($term >= 98.00 and $term <= 100.00):
                        $equiv = 1.00;
                        break;
                };

                $finals->grade = $term;
                $finals->equiv = $equiv;
                $finals->classload_id = $grade->classload_id;
                $finals->student_id = $grade->student_id;
                $finals->save();
            }
        }

        return redirect()->route('teacher.grade.term',[$grade->classload_id, $grade->term]);
    }

}
