<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Saved;
use Illuminate\Http\Request;

class SavedController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $arr=[];
        $saved=Saved::where('user_id',auth()->user()->id)->get();;
        foreach ($saved as $sv){
            array_push($arr, $sv->card_id);
        }
        $class = Card::with('owner', 'category', 'ratings.user', 'reviews.user', 'posts', 'videos', 'enrolledUsers')->whereIn('id',$arr)->orderBy('created_at', 'DESC')->get();
        foreach ($class as $cl){
            if(sizeof($cl->ratings)==0){
                $cl->rating=0;
            }
            else {
                $avg = 0;
                foreach ($cl->ratings as $rating) {
                    $avg += $rating->rating;
                }
                if(($avg / sizeof($cl->ratings)-floor($avg / sizeof($cl->ratings)) >= 0.75)){
                    $cl->rating = ceil($avg / sizeof($cl->ratings));
                }
                else{
                    $cl->rating = floor($avg / sizeof($cl->ratings));
                }
            }
            $cl->enrolled= sizeof($cl->enrolledUsers);
        }
        return response()->json(["status"=>'200', "saved"=>$class]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $savedClass = new Saved();
        $savedClass->user_id = auth()->user()->id;
        $savedClass->card_id = $inputs['card_id'];
        $savedClass->save();
        return response()->json(['status'=>200, 'message'=>'Class saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saved  $saved
     * @return \Illuminate\Http\Response
     */
    public function show(Saved $saved)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saved  $saved
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saved $saved)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saved  $saved
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saved $saved)
    {
        //
    }
}
