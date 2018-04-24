<?php

namespace App\Http\Controllers\Guardian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GuardianStudent;
use Carbon\Carbon;
use App\Semester;
use App\Guardian;
use App\Student;
use Auth;

class GuardianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:guardian');
    }

    public function index()
    {
        $guardian = Guardian::findOrFail(Auth::id());
        return view('guardian.index')->with(compact('guardian'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'student_id' => 'required',
            ]);

        $student = Student::where('student_id', '=', $request->student_id)->first();

        $load = new GuardianStudent;
        $load->student_id = $student->id;
        $load->guardian_id = $request->guardian_id;
        $load->save();

        return redirect()->back();
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $semester = Semester::whereDate('start_date', '>=', Carbon::today()->toDateString())->whereDate('end_date', '<>', Carbon::today()->toDateString())->first();
        return view('guardian.show')->with(compact('student','semester'));
    }

    public function destroy($sid, $gid)
    {
        $load = GuardianStudent::all()->where('student_id','=',$sid)->where('guardian_id','=',$gid)->first();
        $load->delete();
        return redirect()->back();
    }
}