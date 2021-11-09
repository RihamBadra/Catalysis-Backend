<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $class = Card::with('owner', 'category', 'ratings', 'posts', 'enrolledUsers.use')->get();
        return response()->json(['status'=>200, 'class'=>$class]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $class = new Card();
        $class->title = $inputs['title'];
        $class->description = $inputs['description'];
        $class->overview = $inputs['overview'];
        $class->user_id = $inputs['user_id'];
        $class->category_id = $inputs['category_id'];
        $class->save();
        return response()->json(['status'=>200, 'class'=>$class]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $class =  Card::with('user', 'category')->where("category_id", $id)->get();
        return response()->json(['status'=>200, 'class'=>$class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
