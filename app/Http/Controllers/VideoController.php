<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Video;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
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
            return view('errors.invalidVideoLink');
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

    /**
     * Get video based on the id.
     *
     * @return video by id
     */

    private function findById($id)
    {
        return Video::findOrFail($id);
    }

    /**
     * Confirm that the video does indeed exist.
     *
     * @return false if the video doesn't exist or true if it does
     */
    protected function videoExist($videoID)
    {
        $theURL = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$videoID&format=json";
        $headers = get_headers($theURL);
        return (substr($headers[0], 9, 3) !== "404") ? true : false;
    }

    /**
     * Convert the link to and embeded link
     *
     * @return embedded link
     */

    protected function makeEmbedLink($link)
    {
        $videoAddress = explode('=', $link);
        $embed = 'https://www.youtube.com/embed/';

        return isset($videoAddress[1]) ? $embed.$videoAddress[1] : $link;
    }
}
