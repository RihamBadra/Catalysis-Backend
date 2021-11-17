<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $inputs = $request->all();
        $allowed = array('mp4');

        $filename= $request->file('vid_path');

        if(!in_array($inputs['vid_path']->getClientOriginalExtension(), $allowed)) {
            return response()->json(['status' => 400, 'message' => 'Please add mp4 videos only']);
        }
        $vid = new Session();
        $vid->vid_path = $inputs['vid_path']->store('videos',['disk' => 'my_files']);
        $vid->topic = $inputs['topic'];
        $vid->card_id = $inputs['card_id'];
        $vid->save();
        return response()->json(['status'=>200, 'message'=>'video added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
