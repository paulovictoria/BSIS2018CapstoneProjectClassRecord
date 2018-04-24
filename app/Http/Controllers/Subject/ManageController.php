<?php

namespace App\Http\Controllers\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;
use Datatables;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('subject.index');
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'title' => 'required',
            'unit' => 'required',
        ]);

        $subject = new Subject;
        $subject->code = $request->code;
        $subject->title = $request->title;
        $subject->unit = $request->unit;
        $subject->save();

        return redirect('admin/subject');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit')->withSubject($subject);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'title' => 'required',
            'unit' => 'required',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->code = $request->code;
        $subject->title = $request->title;
        $subject->unit = $request->unit;
        $subject->save();

        return redirect('admin/subject');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('admin/subject');
    }

    public function getData()
    {
        $subjects = Subject::all();
        return Datatables::of($subjects)
            ->addColumn('action', function($subjects){
                return '<div class="row">
                    <div class="col mx-0">
                        <a href="'.route('admin.subject.edit',[$subjects->id]).'" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col mx-0">
                        <form method="POST" action="'.route('admin.subject.destroy',[$subjects->id]).'" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="'.csrf_token().'">
                            <input name="_method" type="hidden" value="DELETE">
                            <input class="btn btn-danger btn-block" type="submit" value=" Delete ">
                        </form>
                    </div>
                </div>';
            })
            ->make(true);
    }
}
