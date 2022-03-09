<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\UserSub;

class GetVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $video = Video::find($id);

        $video->views = $video->views + 1;
        $video->save();
        // dd($video);

        return [$video, $video->user];
    }

    public function checkSub($id, $subId)
    {

        $video = Video::find($id);

        $userId = $video->user->id;
        $check = UserSub::where([['user_id', '=' ,$userId],['subscriber_id', '=' ,$subId]])->first();
        // dd($check);
        if($check === null){
            return false;
        }
        else{
            return true;
        }

       
    }

    
}
