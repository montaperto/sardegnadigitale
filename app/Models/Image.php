<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Image extends Model {
    // your code
    protected $table = 'sd_images';

    public static function getImagesByPlaceId($id)
    {
    	$rows = \DB::table('sd_images')
            ->select('sd_images.*')
            ->where('image_item_id', '=', $id)
            ->get();
        return $rows;
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

    public static function getCoverImageByPlaceId($place_id)
    {
        $row = \DB::table('sd_images')
            ->select('sd_images.*')
            ->where('image_item_id', '=', $place_id)
            ->limit(1)
            ->get();
        return $row;
    }

  



}