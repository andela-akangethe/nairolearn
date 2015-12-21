<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the homepage with all the videos.
     *
     * @return homeapage view
     */
    public function getHome()
    {
        $videos = Video::paginate(5);
        return view('homepage', ['videos' => $videos]);
    }
}
