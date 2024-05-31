<?php

namespace App\Http\Controllers;

use App\Models\Kpifin;
use App\Models\Unite;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class KpifinController extends Controller
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
    //this is used for dashboard user in order to 
        {
            try{
            $kpifin=$unit->kpi_fin;
            return $kpifin;}
            catch(\Exception $e){
                Log::debug($e->getMessage());
                return response()->json(['status' => ' error' ,
                'message'=>$e->getMessage()]);
            }
        }
        
        public function showUnitekpifinuser(User $user)
    {
        try{
            $kpifin=[];
            $kpiusers=$user->kpi_fin;
            foreach($kpiusers as $kpiuser){
                $kpifin[]=$kpiuser->unite;
            }
            return $kpifin;//we need databasename to show the available databases to the user
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => ' error' ,
            'message'=>$e->getMessage()]);
        }
        
       
        
    }
    
    public function showUnitekpifin(User $user)
    {
        try{
            $kpifin=[];
            $kpiusers=$user->kpi_fin;
            foreach($kpiusers as $kpiuser){
                $kpifin[]=$kpiuser->unite;
            }
            return $kpifin;//we need databasename to show the available databases to the user
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => ' error' ,
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
            $kpiunit= $unit->kpi_fin;
            $idkpi=$kpiunit->id;
            $state=$user->kpi_fin()->toggle([$idkpi]);
            return response()->json(['status' => 'success']);;
           }
           catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => 'error' ,
            'message'=>$e->getMessage()]);
        }
    }
    public function CheckState(User $user,Unite $unit)
    {//this function will check if the user has the kpi of unit which they are given in the route
           try{
            $kpiunit= $unit->kpi_fin;
            $idkpi=$kpiunit->id;
            $users = User::whereHas('kpi_fin', function (Builder $query)use ($idkpi) {
                $query->where('kpifin_id', 'like',$idkpi);
            })->get();
            $found=false;
            foreach ($users as $usery) {
                if($usery==$user){
                    $found=true;
                    break;
                }
            }
            if($found)
           
            return response(["result"=>$found]);
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return response()->json(['status' => ' error' ,
            'message'=>$e->getMessage()]);
        }
    }

    public function truncation()
    {
        Kpifin::truncate();
    }

    




}
