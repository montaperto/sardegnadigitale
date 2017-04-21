<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class Find extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $places = \App\Models\Place::all();
    	return view('find/home', array('places' => $places));
    }


    public function place($id)
    {
        $place = \App\Models\Place::where('place_id', $id)->first();

        $userInfo = \App\User::find(Auth::id());

        //if the current user exist and he has visited/interested about it
        if(!empty($userInfo['id'])) {
            $place->userInterest = \App\Models\Place::tellMeIfUserIsInterested($id, $userInfo['id']);
            $place->userVisit = \App\Models\Place::tellMeIfUserHasVisited($id, $userInfo['id']);
        } else {
            $place->userInterest = 0;
            $place->userVisit = 0;
        }

        $place->numInterests =  \App\Models\Place::getTotalInterestsByPlace($id);
        $place->numVisits =  \App\Models\Place::getTotalVisitsByPlace($id);        

        return view('place/place', array('place' => $place));
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