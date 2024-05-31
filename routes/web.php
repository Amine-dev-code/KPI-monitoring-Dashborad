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



    