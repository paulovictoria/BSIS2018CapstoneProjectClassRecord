<?php

namespace App\Http\Controllers\Announce;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Announcement;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Admin::findOrFail(auth()->user()->id);
        $announcements = $admin->announcements()->orderBy('id', 'desc')->paginate(5);
        return view('announcement.admin-index')->withAnnouncements($announcements);
    }

    public function create()
    {
        return view('announcement.admin-create');
    }

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
        
        $admin = Admin::find(auth()->user()->id);
        $admin->announcements()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $storeImage,
        ]);
        return redirect('admin/announcement');
    }

    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.admin-show')->withannouncement($announcement);
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.admin-edit')->withannouncement($announcement);
    }

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

        return redirect('admin/announcement');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        
        if ($announcement->announcementable_type != 'App\Admin') {
            return redirect('admin/announcement')->with('error', 'Unthorized Page');
        }

        if ($announcement->image != 'noimage.jpg') {
            Storage::delete('/public/image/'.$announcement->image);
        }

        $announcement->delete();
        return redirect('admin/announcement');
    }

    public function getImage($filename)
    {
        $file = Storage::disk('announce')->get($filename);
        return new Response($file,200);
    }
}
