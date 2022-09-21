<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Authentication\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Semua halaman dibawah, perlu LOGIN
Route::get('/dashboard', DashboardController::class);

Route::get('/pesakit', [PesakitController::class, 'index']);
Route::get('/pesakit/daftar', [PesakitController::class, 'create']);
Route::post('/pesakit/daftar', [PesakitController::class, 'store']);
Route::get('/pesakit/{id}', [PesakitController::class, 'show']);



Route::get('/pesakit/{id}/triage', function ($id) {
    return 'Daftar rekod triage pesakit';
});

Route::post('/pesakit/{id}/triage', function ($id) {
    return 'Terima data daftar rekod triage pesakit';
});



Route::get('/pesakit/{id}/rawatan', function ($id) {
    return 'Daftar rekod rawatan pesakit';
});

Route::post('/pesakit/{id}/rawatan', function ($id) {
    return 'Terima data daftar rekod rawatan pesakit';
});

Route::get('/logout', function () {
    return 'Logout';
});

Route::get('user/add', function () {
    $value = 'test';
    return $value;
});

Route::get('user/{id}', function ($id) {
    return $id;
});

Route::resource('users', UserController::class);
