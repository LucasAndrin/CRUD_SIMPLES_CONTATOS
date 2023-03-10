<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ContactController::class)->prefix('users')->group(function () {
    Route::get('', 'index');
    Route::post('store', 'store');
    Route::get('show', 'show');
    Route::put('update', 'update');
    Route::delete('destroy', 'destroy');
});

Route::controller(CityController::class)->prefix('cities')->group(function () {
    Route::get('', 'index');
    Route::post('store', 'store');
    Route::get('show', 'show');
    Route::put('update', 'update');
    Route::delete('destroy', 'destroy');
});
