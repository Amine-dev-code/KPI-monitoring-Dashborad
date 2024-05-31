<?php

namespace App\Http\Controllers;

use App\Models\Kpiglob;
use App\Models\Unite;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class KpiglobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function showkpi(Unite $unit)
    
        {
            try{
            $kpiglob=$unit->kpi_glob;
            return $kpiglob;}
            catch(\Exception $e){
                Log::debug($e->getMessage());
                return response()->json(['status' => 'error' ,
                'message'=>$e->getMessage()]);
            }
        }
        
        
    public function showUnitekpiglobuser(User $user)
    {
        try{
                $kpiglob=[];
            $kpiusers=$user->kpi_glob;
            foreach($kpiusers as $kpiuser){
                $kpiglob[]=$kpiuser->unite;
            }
            return $kpiglob;//we need databasename to show the available databases to the user
            
            
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }
        
       
        
    }
    public function showUnitekpiglob(User $user)
    {
        try{
                $kpiglob=[];
            $kpiusers=$user->kpi_glob;
            foreach($kpiusers as $kpiuser){
                $kpiglob[]=$kpiuser->unite;
            }
            return $kpiglob;//we need databasename to show the available databases to the user
            
            
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }
        
       
        
    }


    /**
     * Show the form for editing the specified resource.
     */
   
    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function GiveOrdestroy(User $user,Unite $unit)
    {
           try{
            $kpiunit= $unit->kpi_glob;
            $idkpi=$kpiunit->id;
            $state=$user->kpi_glob()->toggle([$idkpi]);
            return response()->json(['status' => ' success']);;
           }
           catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }
    }
    

    public function truncation()
    {
        Kpiglob::truncate();
    }

    




}
