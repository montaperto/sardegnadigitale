<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

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


}