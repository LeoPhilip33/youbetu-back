<?php

namespace App\Http\Controllers;

use App\Models\UserSub;
use App\Http\Requests\StoreUserSubRequest;
use App\Http\Requests\UpdateUserSubRequest;
use App\Models\User;
use App\Models\Video;

class UserSubController extends Controller
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

    public function getSubs($id){

        $subs = UserSub::where('subscriber_id', '=',$id)->get();

        foreach($subs as $sub){
            $sub->photo = $sub->user->photo;
            $sub->name = $sub->user->name;
            $sub->subscriber = $sub->user->subscriber;
        }
        return $subs;
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

    public function subscribe(UpdateUserSubRequest $request)
    {

        $userSub = $request->validate([
            'user_id' => 'required',
            'subscriber_id' => 'required',
        ]);

        $check = UserSub::where(
            [
                ['user_id', '=', $request->user_id],
                ['subscriber_id', '=', $request->subscriber_id]
            ]
        )->first();

        $user = User::find($request->user_id);
        if($check === null){
            UserSub::create($userSub);
            $user->subscriber = $user->subscriber+1;
        }
        else{
            $check->delete();
            $user->subscriber = $user->subscriber-1;
        }

        $user->save();
        return $user;


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
     * @param  \App\Http\Requests\StoreUserSubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSubRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSub  $userSub
     * @return \Illuminate\Http\Response
     */
    public function show(UserSub $userSub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSub  $userSub
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSub $userSub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserSubRequest  $request
     * @param  \App\Models\UserSub  $userSub
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSubRequest $request, UserSub $userSub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSub  $userSub
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSub $userSub)
    {
        //
    }
}
