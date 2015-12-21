<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Video;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * To search the category
     *
     * @return view
     */
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        if (! $query) {
            return redirect('/');
        }

        $category = Video::where('category', $query)->get();

        return view('videos.category', ['category' => $category]);
    }
}
