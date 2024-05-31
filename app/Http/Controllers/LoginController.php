<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use LdapRecord\Models\OpenLDAP\User;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    
    public function login(Request $request){
        try{
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Remember, an LDAP query will be executed on all the array
        // elements in the credentials array (excluding "password").
        // Here, we're locating a user via their "mail" attribute.
        $credentials = [
            'uid' => $request->username,
            'password' => $request->password,
        ];
    
        if (Auth::validate($credentials)) {
            $user = Auth::getLastAttempted();
    
            return response (['status' => 'success',
    'token' => $user->createToken('auth-token')->plainTextToken,
    'user'=>$user
],201);
        }
        else {
            return response([
                'bad credts'
            ],401);
        }
    }
    catch(\Exception $e){
        Log::debug($e->getMessage());
        return response()->json(['status' => ' error' ,
        'message'=>$e->getMessage()]);
    }
    }
   
    public function logout(Request $request){//to logout!
        auth()->user()->tokens()->delete();
        return['message'=>'logged out'];
    }
   
    


}

