<?php

namespace App\Http\Controllers\Semester;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semester;
use Datatables;

class TermController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:registrar');
	}

	public function index()
	{
		return view('semester.index');
	}

	public function create()
	{
		return view('semester.create');
	}

	public function store(Request $request)
	{
		$request->validate(
			[
				'term' => 'required',
				'start_date' => 'required',
				'end_date' => 'required'
			]);

		$sem = new Semester;
		$sem->term = $request->term;
		$sem->start_date = $request->start_date;
		$sem->end_date = $request->end_date;
		$sem->save();

		return redirect()->route('registrar.semester.index');
	}

	public function edit($id)
	{
		$sem = Semester::findOrFail($id);
		return view('semester.edit')->with(compact('sem'));
	}

	public function update(Request $request, $id)
	{
		$request->validate(
			[
				'term' => 'required',
				'start_date' => 'required',
				'end_date' => 'required'
			]);

		$sem = Semester::findOrFail($id);
		$sem->term = $request->term;
		$sem->start_date = $request->start_date;
		$sem->end_date = $request->end_date;
		$sem->save();

		return redirect()->route('registrar.semester.index');
	}

	public function getData()
	{
    $semesters = Semester::all();
      return Datatables::of($semesters)
        ->addColumn('action', function($semesters){
          return '<div class="row">
            <div class="col mx-0">
              <a href="'.route('registrar.semester.edit',[$semesters->id]).'" class="btn btn-primary btn-block">Edit</a>
            </div>
          </div>';
        })
        ->make(true);
	}
}
