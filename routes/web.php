<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

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


Route::resource('/layouts', \App\Http\Controllers\LayoutsController::class)->middleware('auth');
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);

//route pekerjaan
Route::resource('/pekerjaans', \App\Http\Controllers\PekerjaanController::class);

// Confirm Email
Route::get('/confirm-email/{token}', [AuthController::class, 'confirm'])->name('confirm');

// Absensi
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('absensi-create', [AbsensiController::class, 'create']);
Route::get('absensi-destroy/{id}', [AbsensiController::class, 'destroy']);
Route::get('absensi-edit.{id}', [AbsensiController::class, 'edit']);
Route::post('absensi-store', [AbsensiController::class, 'store']);