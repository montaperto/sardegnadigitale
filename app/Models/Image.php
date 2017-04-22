<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Image extends Model {
    // your code
    protected $table = 'sd_images';

    public static function getImagesByPlaceId($id)
    {
    	$images = array();
    	$rows = \DB::table('sd_images')
            ->select('sd_images.*')
            ->where('image_item_id', '=', $id)
            ->get();

		foreach ($rows as $row) {
		    $images[] = $row;
		}  

        return $images;
    }


    public static function saveImage($item_id, $path_original, $path_thumb)
    {
        $userInfo = \App\User::find(Auth::id());
        $id = \DB::table('sd_images')->insertGetId(
        [
            'image_item_id' => $item_id, 
            'image_user_id' => $userInfo['id'],
            'image_original' => $path_original,
            'image_thumb' => $path_thumb,
        ]);

        return $id;
    }

  



}