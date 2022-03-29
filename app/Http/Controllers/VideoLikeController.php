<?php

namespace App\Http\Controllers;

use App\Models\VideoLike;
use App\Models\Video;
use App\Http\Requests\StoreVideoLikeRequest;
use App\Http\Requests\UpdateVideoLikeRequest;

class VideoLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       
        $videos = VideoLike::where('liker_id', '=', $id )->get();


        // $test = $videos[0]->video->id;
        // dd($test);


        $likedVideos = [];
    
        foreach($videos as $video){
            $likedVideos[] = $video->video->id;
        }

        $test = Video::whereIn('id', $likedVideos )->get();
        
        foreach($test as $video){
           

            $video->username = $video->user->name;
            $video->userPhoto = $video->user->photo;
        }
        return $test;
    

    }

    public function checkLike($id, $likerId)
    {

        $video = Video::find($id);
        $check = VideoLike::where([['video_id', '=' ,$id],['liker_id', '=' ,$likerId]])->first();
        // dd($check);
        if($check === null){
            return false;
        }
        else{
            return true;
        }
    }

    public function like(UpdateVideoLikeRequest $request)
    {

        $videoLike = $request->validate([
            'video_id' => 'required',
            'liker_id' => 'required',
        ]);

        $check = VideoLike::where(
            [
                ['video_id', '=', $request->video_id],
                ['liker_id', '=', $request->liker_id]
            ]
        )->first();

        $video = Video::find($request->video_id);
        if($check === null){
            VideoLike::create($videoLike);
            $video->likes = $video->likes+1;
            $video->save();
            return 1;
        }
        else{
            $check->delete();
            $video->likes = $video->likes-1;
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
     * @param  \App\Http\Requests\StoreVideoLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function show(VideoLike $videoLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoLike $videoLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoLikeRequest  $request
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoLikeRequest $request, VideoLike $videoLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoLike $videoLike)
    {
        //
    }
}
