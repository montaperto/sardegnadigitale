<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Place extends Model {
    // your code
    protected $table = 'sd_places';

    public function getPlaceById($id)
    {
    	
    }

    public static function getInterestedPlacesByUserId($id)
    {
    	$places = array();
    	$rows = \DB::table('sd_places')
            ->select('sd_places.*')
            ->join('sd_interests', 'place_id', '=', 'interest_place_id')
            ->where('interest_user_id', '=', $id)
            ->get();

		foreach ($rows as $row) {
		    $places[] = $row;
		}  

        return $places;
    }

    public static function getVisitedPlacesByUserId($id)
    {
    	$places = array();
    	$rows = \DB::table('sd_places')
            ->select('sd_places.*')
            ->join('sd_visits', 'place_id', '=', 'visit_place_id')
            ->where('visit_user_id', '=', $id)
            ->get();

		foreach ($rows as $row) {
		    $places[] = $row;
		}
        return $places;
    }

    public static function markAsInterested($place_id)
    {
        $userInfo = \App\User::find(Auth::id());
        $exist = \App\Models\Place::tellMeIfUserIsInterested($place_id, $userInfo['id']);
        if ($exist) {
            $id = \DB::table('sd_interests')
            ->where('interest_user_id', '=', $userInfo['id'])
            ->where('interest_place_id', '=', $place_id)
            ->delete();
        } else {
            $id = \DB::table('sd_interests')->insertGetId(
            ['interest_user_id' => $userInfo['id'], 'interest_place_id' => $place_id]);
        }    	
        return $id;
    }

    public static function markAsVisited($place_id)
    {
        $userInfo = \App\User::find(Auth::id());
        $exist = \App\Models\Place::tellMeIfUserHasVisited($place_id, $userInfo['id']);
        if ($exist) {
            $id = \DB::table('sd_visits')
            ->where('visit_user_id', '=', $userInfo['id'])
            ->where('visit_place_id', '=', $place_id)
            ->delete();
        } else {
            $id = \DB::table('sd_visits')->insertGetId(
                ['visit_user_id' => $userInfo['id'], 'visit_place_id' => $place_id]);
        }
        return $id;
    }

    public static function getTotalVisitsByPlace($place_id)
    {
        $n = \DB::table('sd_visits')
        ->where('visit_place_id', '=', $place_id)
        ->count();
        return $n;
    }

    public static function getTotalInterestsByPlace($place_id)
    {
        $n = \DB::table('sd_interests')
        ->where('sd_interests.interest_place_id', '=', $place_id)
        ->count();
        return $n;
    }

    public static function tellMeIfUserIsInterested($place_id, $user_id)
    {
        $n = \DB::table('sd_interests')
            ->where('sd_interests.interest_place_id', '=', $place_id)
            ->where('sd_interests.interest_user_id', '=', $user_id)
            ->count();
        return $n;
    }

    public static function tellMeIfUserHasVisited($place_id, $user_id)
    {
        $n = \DB::table('sd_visits')
            ->where('sd_visits.visit_place_id', '=', $place_id)
            ->where('sd_visits.visit_user_id', '=', $user_id)
            ->count();
        return $n;
    }




}