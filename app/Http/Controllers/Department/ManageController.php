<?php

namespace App\Http\Controllers\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Datatables;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('department.index');
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $department = new Department;
        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.department.index');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('department.edit')->withDepartment($department);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $department = Department::findOrFail($id);
        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();

        return redirect('admin/department');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect('admin/department');
    }

    public function getData()
    {
        $departments = Department::all();
        return Datatables::of($departments)
            ->addColumn('action', function($departments){
                return '<div class="row">
                    <div class="col mx-0">
                        <a href="'.route('admin.department.edit',[$departments->id]).'" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col mx-0">
                        <form method="POST" action="'.route('admin.department.destroy',[$departments->id]).'" accept-charset="UTF-8">
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