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

Auth::routes();

Route::get('/', [ArsipController::class, 'index'])->name('arsip');
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip/store', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}/show', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{id}/delete', [ArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('arsip', ArsipController::class)->only('index', 'create', 'store', 'show', 'destroy');
Route::get('/about', function () {
    return view('about.about');
})->name('about');

