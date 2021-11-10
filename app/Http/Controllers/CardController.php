<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class CardController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $input=$request->all();
        $arr=[];
        $cats=UserCategory::where('user_id',$input['user_id'])->get();
        foreach ($cats as $cat){
            array_push($arr,$cat->category_id);
        }
        $class = Card::with('owner', 'category', 'ratings', 'posts', 'enrolledUsers')
            ->whereIn('category_id',$arr)->get();
        foreach ($class as $cl){
            if(sizeof($cl->ratings)==0){
                $cl->rating=0;
            }
            else {
                $avg = 0;
                foreach ($cl->ratings as $rating) {
                    $avg += $rating->rating;
                }
                if(($avg / sizeof($cl->ratings)-floor($avg / sizeof($cl->ratings))>=0.75)){
                    $cl->rating = ceil($avg / sizeof($cl->ratings));
                    }
                    else{
                    $cl->rating = floor($avg / sizeof($cl->ratings));
                }

            }
            $cl->enrolled= sizeof($cl->enrolledUsers);
        }
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
