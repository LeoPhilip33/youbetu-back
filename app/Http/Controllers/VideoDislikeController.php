<?php

namespace App\Http\Controllers;

use App\Models\VideoDislike;
use App\Models\Video;
use App\Http\Requests\StoreVideoDislikeRequest;
use App\Http\Requests\UpdateVideoDislikeRequest;

class VideoDislikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function checkDislike($id, $dislikerId)
    {

        $video = Video::find($id);
        $check = VideoDislike::where([['video_id', '=' ,$id],['disliker_id', '=' ,$dislikerId]])->first();
        // dd($check);
        if($check === null){
            return false;
        }
        else{
            return true;
        }
    }

    public function dislike(UpdateVideoDislikeRequest $request)
    {

        $videoDislike = $request->validate([
            'video_id' => 'required',
            'disliker_id' => 'required',
        ]);

        $check = VideoDislike::where(
            [
                ['video_id', '=', $request->video_id],
                ['disliker_id', '=', $request->disliker_id]
            ]
        )->first();

        $video = Video::find($request->video_id);
        if($check === null){
            VideoDislike::create($videoDislike);
            $video->dislikes = $video->dislikes+1;
            $video->save();
            return 1;
        }
        else{
            $check->delete();
            $video->dislikes = $video->dislikes-1;
            $video->save();
            return 0;
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoDislikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoDislikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function show(VideoDislike $videoDislike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoDislike $videoDislike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoDislikeRequest  $request
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoDislikeRequest $request, VideoDislike $videoDislike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoDislike $videoDislike)
    {
        //
    }
}
