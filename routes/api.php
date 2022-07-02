<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('ping', function() {
    return response()->api('server up to work');
});

Route::get('/categorys',[CategoryController::class,'index']);

Route::get('/aparments',[ApartmentController::class,'index']);
Route::get('/aparments/{category}',[ApartmentController::class,'show']);


Route::get('/search/{search}',[SearchController::class,'search']);
Route::post('/search',[SearchController::class,'search']);
Route::post('/advanced_search',[SearchController::class,'advanced_search']);

Route::post('/order/store',[OrderController::class,'store']);

Route::post('/apartments/store',[ApartmentController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user login and register and update
Route::post('login', [AuthController::class,'login']);
Route::post('/user_update', [AuthController::class,'update_user']);

Route::middleware('auth:sanctum')->group(function () {    

    Route::get('/user', [AuthController::class,'user']);
    
});