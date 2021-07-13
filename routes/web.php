<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CategoryController;
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

/*Route::get('/', function(){
    return view('welcome');
});*/

Route::get('/', [CategoryController::class,'index']);

Route::get('/req/{cti}/{lang}/{per_page}', [CategoryController::class,'req']);
Route::get('/cat/{catID}', [CategoryController::class,'cat']);
Route::get('/tag/{tagID}', [CategoryController::class,'tag']);

