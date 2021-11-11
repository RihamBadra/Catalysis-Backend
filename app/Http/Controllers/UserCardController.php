<?php

namespace App\Http\Controllers;

use App\Models\UserCard;
use Illuminate\Http\Request;

class UserCardController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $enrolledUsers = UserCard::all();
        return response()->json(['status'=>200, 'users-classes'=>$enrolledUsers]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $user_enrolled = new UserCard();
        $user_enrolled->user_id = auth()->user()->id;
        $user_enrolled->card_id = $inputs['card_id'];
        $user_enrolled->save();
        return response()->json(['status'=>200, 'message'=>'user registered to class successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function show(UserCard $userCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCard $userCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCard $userCard)
    {
        //
    }
}
