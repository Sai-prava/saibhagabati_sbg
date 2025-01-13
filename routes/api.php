<?php

use App\Http\Controllers\Api\CardViewController;
use App\Http\Controllers\Api\LivelocationController;
use App\Http\Controllers\Api\TimelineController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login',[UserController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('livelocation', [LivelocationController::class, 'liveLocationAjax'])->name('api.livelocationAjax');
    Route::post('dashboard/getTimeLineAjax', [TimelineController::class, 'getTimeLineAjax'])->name('api.getTimeLineAjax');
    Route::post('timeLine/updateLocationAjax', [TimelineController::class, 'updateLocationAjax'])->name('api.timeLineUpdateLocationAjax');
    Route::get('dashboard/cardViewAjax', [CardViewController::class, 'cardViewAjax'])->name('api.CardViewAjax');
});
