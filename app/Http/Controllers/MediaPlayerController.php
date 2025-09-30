<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaPlayerController extends Controller
{
    public function index()
    {
        return view('mediaplayer');
    }
}
