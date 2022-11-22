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

// Route::get('/home', function () {
//     return view('home');
// });

Route::resource('/ujian', App\Http\Controllers\UjianController::class )
    ->middleware('auth');

Route::resource('/siswa', App\Http\Controllers\SiswaController::class )
    ->middleware('auth');

Route::resource('/admin', App\Http\Controllers\AdminController::class )
    ->middleware('auth');



// Route::get('/home', function () {
//     return view('home');
// })->name('home')->middleware('auth');;
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('alumni', \App\Http\Controllers\UjianController::class)
//     ->middleware('auth');

// Route::resource('users', \App\Http\Controllers\SiswaController::class)
//     ->middleware('auth');

// Route::resource('users', \App\Http\Controllers\AdminController::class)
//     ->middleware('auth');

// beberapa fungsi endpoint resource yang perlu kita ketahui:
// 1. Route get => nama_route => menjalankan fungsi index
// 2. Route get => nama_route/create => menjalankan fungsi create
// 3. Route post => nama_route => menjalankan fungsi store
// 4. Route get => nama_route/{ id } => menjalankan fungsi show
// 5. Route put/patch => nama_route/{ id } => menjalankan fungsi update
// 6. Route delete => nama_route/{ id } => menjalankan fungsi delete
// 7. Route get => nama_route/{ id }/edit => menjalankan fungsi edit
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
