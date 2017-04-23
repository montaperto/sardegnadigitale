<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class Account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userInfo = \App\User::find(Auth::id());

        //todo -> if user not exist redirect to login page

        $interests = \App\Models\Place::getInterestedPlacesByUserId($userInfo['id']);
        foreach ($interests as $interest) {
            $image = \App\Models\Image::getCoverImageByPlaceId($interest->place_id);
            if(empty($image[0]->image_thumb)) {
                $interest->place_cover_img = 'img/places/no_photo.jpg';
            } else {
                $interest->place_cover_img = $image[0]->image_thumb;
            }
        }

        $visits = \App\Models\Place::getVisitedPlacesByUserId($userInfo['id']);
        foreach ($visits as $visit) {
            $image = \App\Models\Image::getCoverImageByPlaceId($visit->place_id);
            if(empty($image[0]->image_thumb)) {
                $visit->place_cover_img = 'img/places/no_photo.jpg';
            } else {
                $visit->place_cover_img = $image[0]->image_thumb;
            }
        }

        $userInfo->numInterests = count($interests);
        $userInfo->numVisits = count($visits);
        
    	return view('account/account', array('userInfo' => $userInfo, 'interests' => $interests, 'visits' => $visits));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
      /*$places = Place::find();
      return view('find.home.show', array('places' => $place));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}