<?php

namespace App\Http\Controllers;

use App\Models\VideoComments;
use App\Http\Requests\StoreVideoCommentsRequest;
use App\Http\Requests\UpdateVideoCommentsRequest;

class VideoCommentsController extends Controller
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
     * @param  \App\Http\Requests\StoreVideoCommentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoCommentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoComments  $videoComments
     * @return \Illuminate\Http\Response
     */
    public function show(VideoComments $videoComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoComments  $videoComments
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoComments $videoComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoCommentsRequest  $request
     * @param  \App\Models\VideoComments  $videoComments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoCommentsRequest $request, VideoComments $videoComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoComments  $videoComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoComments $videoComments)
    {
        //
    }
}
