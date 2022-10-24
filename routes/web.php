<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SendMessage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//auth
Route::get('/',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'store']);
Route::get('/logout',[LoginController::class,'destroy']);
// send message
Route::get('/send/{hash}',[SendMessage::class,'index']);
// process message
Route::resource('/message',MessageController::class)->only(['index','show','store','destroy'])->middleware('user');
// search
Route::get('/message/search/{query}',[MessageController::class,'search']);
// success feedback
Route::get('/success',function(){
  return view('users.feedback-message');
});
