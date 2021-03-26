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
    // get all
    Route::get('/', [HaloController::class, 'index']);

    // get by id
    Route::get('/{id}', [HaloController::class, 'show']);
    // get by username
    Route::get('/by-username/{username}', [HaloController::class, 'showByUsername']);

    // create akun
    Route::post('/', [HaloController::class, 'create']);
    // update akun
    Route::put('/{id}', [HaloController::class, 'update']);
    // delete akun
    Route::delete('/{id}', [HaloController::class, 'delete']);
  });

});
