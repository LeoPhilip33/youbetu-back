<?php

namespace App\Http\Controllers;

use App\Models\VideoDislike;
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
