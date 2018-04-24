<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Announcement;
use Auth;


class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('id', 'desc')->paginate(5);
        return view('announcement.index')->withAnnouncements($announcements);
    }

    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.show')->withannouncement($announcement);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('announce')->get($filename);
        return new Response($file,200);
    }
}
