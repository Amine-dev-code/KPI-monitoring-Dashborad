<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


// Assuming $time is a time type variable


class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $time=Time::all();
        return $time;
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function AddOrupdate(Request $request)
    {
        
        try{
        $timing=Time::find(1);
        if($timing){
            $timeAsString = Carbon::parse($request->time)->format('H:i');
            $timing->time=$timeAsString;
        if($timing->save())
        return response(["result"=>"time updated successfully"]);
        }
        else{
            Time::create([
                'time'=>$request->time
            ]);
            if($timing->save())
            return response(["result"=>"time added successfully"]);
        }
        }
        
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }

    }
    public function get(){
        try{
        $time=Time::find(1);
        return response()->json(['status' => 'success',
        'time'=>$time]);
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */

}
