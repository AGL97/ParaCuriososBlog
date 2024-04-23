<?php

use App\Http\Controllers\ApiCardController;
use App\Http\Controllers\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/blog', ApiCardController::class);
Route::post('/create',[ApiUserController::class,'createUser']);
Route::post('/login',[ApiUserController::class,'loginUser']);
Route::get('/user',[ApiUserController::class,function(Request $request){
    return $request->user();
}])->middleware('auth:sanctum');