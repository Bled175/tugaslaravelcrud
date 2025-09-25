<?php

use App\Http\Controllers\ControllerDepartemen;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SessionController;
use App\Models\departemen;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('dashboard');
})->name('dashboard')->middleware('inilogin');

Route::resource('departemen', ControllerDepartemen::class)->middleware('inilogin');
Route::resource('karyawan', KaryawanController::class)->middleware('inilogin');
Route::get('login', [SessionController::class, 'index'])->middleware('initamu');
Route::get('sesi', [SessionController::class, 'index'])->middleware('initamu');
Route::post('sesi/login', [SessionController::class, 'login'])->middleware('initamu');
Route::post('sesi/logout', [SessionController::class, 'logout'])->middleware('inilogin');
