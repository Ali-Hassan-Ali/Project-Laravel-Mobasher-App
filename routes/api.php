<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Api\SearchController;

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
Route::get('Rents',[ApartmentController::class,'getRents']);

Route::get('search/{search}',[SearchController::class,'search']);
Route::get('advanced_search/{search}',[SearchController::class,'advanced_search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
