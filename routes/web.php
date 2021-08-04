<?php

use App\Http\Controllers\DevelopersController;

use Illuminate\Support\Facades\Route;

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


Route::get('developers',[DevelopersController::class, 'developers'])->name('developers.developers');
Route::get('developers/get/{id}', [DevelopersController::class, 'get'])->name('developer.get');
Route::post('developers/create', [DevelopersController::class, 'create'])->name('developer.create');
Route::put('developer/{id}', [DevelopersController::class, 'update'])->name('developer.update');

Route::get('developer/delete/{id}', [DevelopersController::class,'delete'])->name('developer.delete');
