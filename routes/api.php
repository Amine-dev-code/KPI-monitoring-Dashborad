<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KpiglobController;
use App\Http\Controllers\KpifinController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\MailsendingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//CheckState

Route::get('/mail',[MailsendingController::class,'sendmail'])->name('mailsending');



Route::post('/unite/login',[LoginController::class,'login'])->name('login');


Route::group(['middleware'=>['auth:sanctum']],function () {
  Route::get('/time',[TimeController::class,'get']); 
  Route::post('/time/ajout',[TimeController::class,'AddOrupdate']); 
  Route::post('/logout',[LoginController::class,'logout'])->name('logout');
  Route::get('/user/unite/fin/related/{user}',[KpifinController::class,'showUnitekpifin']); 
  Route::get('/user/unite/glb/related/{user}',[KpiglobController::class,'showUnitekpiglob']);
Route::post('/unite/ajout',[UniteController::class,'import']);
Route::put('/unite/update/{id}',[UniteController::class,'update'])->name('updateunit');
Route::get('/kpifin/{unit}',[KpifinController::class,'showkpi']);  
Route::get('/kpiglob/{unit}',[KpiglobController::class,'showkpi']);
Route::get('/unite/databases',[UniteController::class,'index'])->name('databases');
Route::get('/trashedusers',[UserController::class,'TrashedUsers']);
Route::get('/users',[UserController::class,'showuser']);
Route::get('/user/unite/kpiglob/{user}',[KpiglobController::class,'showUnitekpiglobuser']);  
Route::get('/kpiglb/ajout/{user}/{unit}',[KpiglobController::class,'GiveOrdestroy'])->name('givingkpi');
Route::get('/kpifin/ajout/{user}/{unit}',[KpifinController::class,'GiveOrdestroy'])->name('givingkpi');
Route::get('/user/unite/kpifin/{user}',[KpifinController::class,'showUnitekpifinuser']); 
Route::get('/getbackuser/{user}',[UserController::class,'getBackSpecificUser']);
Route::get('/unit/destroy/{id}',[UniteController::class,'destroy'])->name('unitedestroy');
Route::delete('/user/delete/{id}',[UserController::class,'DeleteUser'])->name('deleteuser');
Route::get('/users/getusers',[UserController::class,'callusers'])->name('getusers');
});







    
   
   

  Route::get('/user/truncate',[UserController::class,'truncate'])->name('truncate');
  
  Route::put('/unite/update',[UniteController::class,'Autoimport'])->name('updateunit');
  
 Route::get('/unite/truncate',[UniteController::class,'truncation'])->name('truncate');



    