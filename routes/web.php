<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesakitController;
use App\Http\Controllers\RawatanController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesakitTriageController;
use App\Http\Controllers\Authentication\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Semua halaman dibawah, perlu LOGIN
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', DashboardController::class);

    Route::get('/pesakit', [PesakitController::class, 'index'])->name('pesakit.index');
    Route::get('/pesakit/daftar', [PesakitController::class, 'create'])->name('pesakit.create');
    Route::post('/pesakit/daftar', [PesakitController::class, 'store']);
    Route::get('/pesakit/{id}/edit', [PesakitController::class, 'edit']);
    Route::patch('/pesakit/{id}/edit', [PesakitController::class, 'update']);
    Route::get('/pesakit/{id}', [PesakitController::class, 'show']);
    Route::delete('/pesakit/{id}/delete', [PesakitController::class, 'destroy']);

    // Routing untuk download rekod senarai pesakit dalam format json
    Route::get('download/pesakit/json', [DownloadController::class, 'pesakitJson'])->name('download.pesakit.json');
    Route::get('download/pesakit/excel', [DownloadController::class, 'pesakitExcel'])->name('download.pesakit.excel');



    Route::get('/pesakit/{id}/triage', [PesakitTriageController::class, 'create'])->name('pesakit.triage.create');
    Route::post('/pesakit/{id}/triage', [PesakitTriageController::class, 'store'])->name('pesakit.triage.store');

    Route::get('/pesakit/{id}/rawatan', [RawatanController::class, 'create'])->name('pesakit.rawatan.create');
    Route::post('/pesakit/{id}/rawatan', [RawatanController::class, 'store'])->name('pesakit.rawatan.store');


    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
