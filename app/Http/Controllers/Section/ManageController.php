<?php

namespace App\Http\Controllers\Section;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\Section;
use Datatables;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    public function index()
    {
        $departments = Department::all();
        return view('section.manage-index')->with('departments',$departments);
    }

    public function createSection($id)
    {
        $department = Department::findOrFail($id);
        $section = $department->sections()->first();
        return view('section.manage-create')->with(compact('department','section'));
    }

    public function storeSection(Request $request, $id)
    {
        $request->validate([
            'year' => 'required',
            'class' => 'required'
        ]);

        $section = new Section([
            'year' => $request->year,
            'class' => $request->class,
        ]);

        $department = Department::findOrFail($id);

        $department->sections()->save($section);

        return redirect()->route('registrar.section.show',$id);
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('section.manage-show')->with(compact('department'));
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('section.manage-edit')->with('section',$section);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required',
            'class' => 'required'
        ]);

        $section = Section::findOrFail($id);
        $section->year = $request->year;
        $section->class = $request->class;
        $section->save();

        return redirect('/registrar/section');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back();
    }

    public function getSection($id)
    {
        $department = Department::findOrFail($id);
        $sections = $department->sections()->get();
        return Datatables::of($sections)
            ->addColumn('action', function($sections){
                return '<div class="row">
                    <div class="col mx-0">
                        <a href="'.route('registrar.load.show',[$sections->id]).'" class="btn btn-success btn-block">Show</a>
                    </div>
                    <div class="col mx-0">
                        <a href="'.route('registrar.section.edit',[$sections->id]).'" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col mx-0">
                        <form method="POST" action="'.route('registrar.section.destroy',[$sections->id]).'" accept-charset="UTF-8">
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
