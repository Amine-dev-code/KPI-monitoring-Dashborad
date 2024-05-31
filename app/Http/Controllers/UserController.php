<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
   
   public function showuser(){
      try{
    $users=User::all();
    return $users;
      }
      catch(\Exception $e){
         Log::debug($e->getMessage());
         return response()->json(['status' => ' error' ,
         'message'=>$e->getMessage()]);
     }
   }
   public function callusers(){
      // php artisan ldap:import users --delete-missing
      try{
 
   Artisan::call('ldap:import', [
      'provider' => 'ldap',
      '--no-interaction',
      '--delete-missing' => true,
      
  ]);
  
   return response()->json(['message'=>'successfully called']);
}
catch(\Exception $e){
   Log::debug($e->getMessage());
   return response()->json(['status' => 'error' ,
   'message'=>$e->getMessage()]);
}
   }
   
  
   public function DeleteUser(String $id){
      try{
      $user=User::findOrfail($id);
      if($user->delete()){
         return response()->json(['message'=>'user deleted successfuly']);
      }
   }
   catch(\Exception $e){
      Log::debug($e->getMessage());
      return response()->json(['status' => ' error' ,
      'message'=>$e->getMessage()]);
  }
      
   }
   public function TrashedUsers(){
      try{
      $users = User::onlyTrashed()->get();
      return $users;
      }
      catch(\Exception $e){
         Log::debug($e->getMessage());
         return response()->json(['status' => ' error' ,
         'message'=>$e->getMessage()]);
     }
   }
   public function getBackSpecificUser(String $id){
      try{
      $user = User::onlyTrashed()
      ->where('id', $id)
      ->restore();
      return $user;
      }
      catch(\Exception $e){
         Log::debug($e->getMessage());
         return response()->json(['status' => ' error' ,
         'message'=>$e->getMessage()]);
     }
   }
   public function truncate()
    {
        User::truncate();
        return response()->json('done');
    }
    
}
