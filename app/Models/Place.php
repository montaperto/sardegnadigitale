<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

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




}