<?php

namespace App\Http\Controllers\Announce;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Announcement;
use App\Registrar;
use Auth;

class RegistrarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:registrar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrar = Registrar::findOrFail(auth()->user()->id);
        $announcements = $registrar->announcements()->orderBy('id', 'desc')->paginate(5);
        return view('announcement.registrar-index')->withAnnouncements($announcements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcement.registrar-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $storeImage = time().'.'.$file->getClientOriginalExtension();
            $path = Storage::disk('announce')->put($storeImage,file_get_contents($file->getRealPath()));
        } else {
            $storeImage = 'noimage.jpg';
        }
        
        $registrar = Registrar::find(auth()->user()->id);
        $registrar->announcements()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $storeImage,
        ]);
        return redirect('registrar/announcement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.registrar-show')->withannouncement($announcement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.registrar-edit')->withannouncement($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $storeImage = time().'.'.$file->getClientOriginalExtension();
            $path = Storage::disk('announce')->put($storeImage,file_get_contents($file->getRealPath()));
        } else {
            $storeImage = $request->preview;
        }

        $announcement = Announcement::findOrFail($id);
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->image = $storeImage;
        $announcement->save();

        return redirect('registrar/announcement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        
        if ($announcement->announcementable_type != 'App\Registrar') {
            return redirect('registrar/announcement')->with('error', 'Unthorized Page');
        }

        if ($announcement->image != 'noimage.jpg') {
            Storage::delete('/public/image/'.$announcement->image);
        }

        $announcement->delete();
        return redirect('registrar/announcement');
    }

    public function getImage($filename)
    {
        $file = Storage::disk('announce')->get($filename);
        return new Response($file,200);
    }
}
