<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return $videos;
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
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'miniature' => 'required',
            'video' => 'required',
            'user_id' => 'required',
        ]);


        $input = $request->all();

        if ($miniature = $request->file('miniature')) {
            $destinationPath = 'upload/miniatures/';
            $miniatureName = date('YmdHis') . "." . $miniature->getClientOriginalExtension();
            $miniature->move($destinationPath, $miniatureName);
            $input['miniature'] = $miniatureName;
        }
        if ($video = $request->file('video')) {
            $destinationPath = 'upload/videos/';
            $videoName = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $videoName);
            $input['video'] = $videoName;
        }


        Video::create($input);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
