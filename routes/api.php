<?php

use App\Http\Controllers\Api\CardViewController;
use App\Http\Controllers\Api\LivelocationController;
use App\Http\Controllers\Api\TimelineController;
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

Route::get('livelocation',[LivelocationController::class, 'liveLocationAjax']);
Route::post('dashboard/getTimeLineAjax', [TimelineController::class, 'getTimeLineAjax'])->name('dashboard.getTimeLineAjax');
Route::post('timeLine/updateLocationAjax', [TimelineController::class, 'updateLocationAjax'])->name('timeLine.updateLocationAjax');
Route::get('dashboard/cardViewAjax', [CardViewController::class, 'cardViewAjax'])->name('dashboard/cardViewAjax');