<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/upload', function () {
    return view('upload');
})->middleware('auth');

Route::get('/', [MediaController::class , 'index'])->middleware('auth');
Route::post('/upload', [MediaController::class, 'create'])->middleware('auth');

Route::get('/user/edit/', [UserController::class , 'edit'])->middleware('auth');
Route::put('/user/edit/', [UserController::class , 'update'])->middleware('auth');

Route::get('/image/edit/{mediaId}', [MediaController::class , 'edit'])->middleware('auth');
Route::put('/image/edit/{mediaId}', [MediaController::class , 'update'])->middleware('auth');

Route::delete('/image/delete/{mediaId}', [MediaController::class , 'delete'])->middleware('auth');

