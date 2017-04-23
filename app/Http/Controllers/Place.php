<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class Place extends Controller
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

    public function markasinterested(Request $request)
    {        
        $place_id = $request->place_id;
        $id = \App\Models\Place::markAsInterested($place_id);
        header('Content-Type: application/json');
        /*if ($request->isMethod('post')){    
            return response()->json(['response' => true]); 
        }*/
        return response()->json(['response' => true]);
    }

    public function markasvisited(Request $request)
    {        
        $place_id = $request->place_id;
        $id = \App\Models\Place::markAsVisited($place_id);
        header('Content-Type: application/json');
        /*if ($request->isMethod('post')){    
            return response()->json(['response' => true]); 
        }*/
        return response()->json(['response' => true]);
    }

    public function storeImage(Request $request)
    {
        $image = new \Image();
        $this->validate($request, [
            'place_id' => 'required',
            'image' => 'required'
        ]);

        $place_id = $request->place_id;
        $userInfo = \App\User::find(Auth::id());
        if(!empty($userInfo['id'])) {

            if($request->hasFile('image')) {

                $image = Input::file('image');
                $time = time();
                //$ext = $image->getClientOriginalExtension();
                $ext = "jpg";

                $original  = $time . '.' . $ext;
                $thumb = $time . '_thumb.' . $ext;

                $path = public_path('img/places/' . $place_id);

                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                $path_thumb = public_path('img/places/' . $place_id . '/' . $thumb);
                $path_original = public_path('img/places/' . $place_id . '/' . $original);

                $path_thumb_partial = '/img/places/' . $place_id . '/' . $thumb;
                $path_original_partial = '/img/places/' . $place_id . '/' . $original;

                $size = getimagesize($image);
                $width = $size[0];
                $height = $size[1];

                if($width > 700) {
                    $height = 700 * $height / $width;
                    $width = 700;
                } else {
                    $width = 700 * $width / $height;
                    $height = 700;
                }
                //crop the image without strange dimension       
                \Image::make($image->getRealPath())->fit(200, 200)->save($path_thumb);
                \Image::make($image->getRealPath())->fit(intval($width), intval($height))->save($path_original);

                $id = \App\Models\Image::saveImage($place_id, $path_original_partial, $path_thumb_partial);
                
            }
        }
        return redirect('place/' . $place_id);
    }




}