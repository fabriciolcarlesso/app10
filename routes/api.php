<?php

use App\Http\Controllers\Api\DevelopersApiController as DevelopersApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api.authorization'])->group(function () {
    Route::get('developers', [DevelopersApiController::class, 'developers']);
    Route::get('developers/get/{id}', [DevelopersApiController::class, 'get']);
    Route::post('developers/create', [DevelopersApiController::class, 'create']);
    Route::put('developers/update/{id}', [DevelopersApiController::class, 'update']);
    Route::delete('developers/delete/{id}', [DevelopersApiController::class,'delete']);
});
