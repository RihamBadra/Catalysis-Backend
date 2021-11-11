<?php

namespace App\Http\Controllers;

use App\Models\UserCategory;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $userCategories = UserCategory::get();
        return response()->json(['user_categories'=>$userCategories]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $userCategory = new UserCategory();
        $userCategory->user_id = auth()->user()->id;
        $userCategory->category_id = $inputs['category_id1'];
        $userCategory->save();
        $userCategory2 = new UserCategory();
        $userCategory2->user_id = auth()->user()->id;
        $userCategory2->category_id = $inputs['category_id2'];
        $userCategory2->save();
        $userCategory3 = new UserCategory();
        $userCategory3->user_id = auth()->user()->id;
        $userCategory3->category_id = $inputs['category_id3'];
        $userCategory3->save();
        return response()->json(['status'=>200, 'message'=>'user categories added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UserCategory $userCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCategory $userCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCategory $userCategory)
    {
        //
    }
}
