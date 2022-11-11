<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ujian', function () {
    return view('ujian.index');
});

Route::get('/siswa', function () {
    return view('siswa.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

// Route::get('/home', function () {
//     return view('home');
// })->name('home')->middleware('auth');;
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('alumni', \App\Http\Controllers\UjianController::class)
//     ->middleware('auth');

// Route::resource('users', \App\Http\Controllers\SiswaController::class)
//     ->middleware('auth');

// Route::resource('users', \App\Http\Controllers\AdminController::class)
//     ->middleware('auth');