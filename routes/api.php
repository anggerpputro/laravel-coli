<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\HaloController;

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


Route::middleware('api')->group(function() {
  Route::get('ndes', function() {
    return "OK ndes!!";
  });

  Route::prefix('halo')->group(function() {
    // /halo/create
    Route::post('create', [HaloController::class, 'create']);

    // /halo/show
    Route::get('show/{id}', [HaloController::class, 'show']);

    // /halo/show-by-username
    Route::get('show-by-username/{username}', [HaloController::class, 'showByUsername']);
  });

});
