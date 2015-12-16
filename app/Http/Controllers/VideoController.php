<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Video;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::personalize()->get();
        return view('videos.index', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $needles = ['=', '/'];
        foreach ($needles as $needle) {
            $videoID = substr($request['url'], strrpos($request['url'], $needle, -1) + 1);
            if ($this->videoExist($videoID)) {
                $video = new Video();
                $video->title = $request['title'];
                $video->url = $this->makeEmbedLink($request['url']);
                $video->description = $request['description'];
                $video->category = $request['category'];
                $video->user_id = Auth::user()->id;
                $video->save();

                return redirect('videos');
            }
            return 'Invalid Youtube video link! Go back to <a href="/videos/create">dashboard</a>';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('videos.show', ['video' => $this->findById($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('videos.edit', ['Video' => $this->findById($id)]);
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
        $updateVideo = Request::all();
        $this->findById($id)->update($updateVideo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->findById($id)->delete();
        return redirect('videos');
    }

    private function findById($id)
    {
        return Video::findOrFail($id);
    }

    protected function videoExist($videoID)
    {
        $theURL = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$videoID&format=json";
        $headers = get_headers($theURL);
        return (substr($headers[0], 9, 3) !== "404") ? true : false;
    }

    protected function makeEmbedLink($link)
    {
        $videoAddress = explode('=', $link);
        $embed = 'https://www.youtube.com/embed/';

        return isset($videoAddress[1]) ? $embed.$videoAddress[1] : $link;
    }
}
