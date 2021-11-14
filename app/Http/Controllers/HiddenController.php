<?php

namespace App\Http\Controllers;

use App\Models\Hidden;
use Illuminate\Http\Request;

class HiddenController extends Controller
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
        $hiddenClass = new Hidden();
        $hiddenClass->user_id = auth()->user()->id;
        $hiddenClass->card_id = $inputs['card_id'];
        $hiddenClass->save();
        return response()->json(['status'=>200, 'message'=>'This class has been hidden']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hidden  $hidden
     * @return \Illuminate\Http\Response
     */
    public function show(Hidden $hidden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hidden  $hidden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hidden $hidden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hidden  $hidden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hidden $hidden)
    {
        //
    }
}
