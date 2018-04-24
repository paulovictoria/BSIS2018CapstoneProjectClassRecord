<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Announcement;

class PageController extends Controller
{
  public function index()
  {
  	$announcements = Announcement::orderBy('id', 'desc')->take(3)->get();
  	return view('index')->with('announcements',$announcements);
  }
  
  public function getImage($filename)
  {
      $file = Storage::disk('announce')->get($filename);
      return new Response($file,200);
  }
}
