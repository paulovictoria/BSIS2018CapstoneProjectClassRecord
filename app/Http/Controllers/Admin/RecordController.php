<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semester;
use App\Student;
use App\Classload;
use App\Sectionload;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $semesters = Semester::all();
        return view('admin.record.index')->with(compact('semesters'));
    }

    public function show($id)
    {
        $loads = Classload::where('semester_id', '=', $id);
        $secloads = Sectionload::all();
        return view('admin.record.show')->with(compact('loads','secloads'));
    }

    public function showClass($term, $id)
    {
        $load = Classload::findOrFail($id);
        $secloads = Sectionload::all();
        return view('admin.record.subject')->with(compact('load','secloads','students','term'));
    }
}
