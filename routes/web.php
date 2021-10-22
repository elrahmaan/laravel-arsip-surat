<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AboutController;
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
    return view('layouts.app');
});

Auth::routes();

Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('arsip', ArsipController::class)->only('index');
Route::resource('about', AboutController::class)->only('index');

