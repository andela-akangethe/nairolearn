<?php

namespace app\Http\Controllers;

use App\Video;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($category)
    {
        $videos = Video::all();
        $videosCategory = Video::where('category', $category)->get();

        return view('videos.category', ['videos' => $videos, 'videosCategory' => $videosCategory]);
    }
}
