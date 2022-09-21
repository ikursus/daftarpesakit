<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    //kebab-case // Biasanya digunakan untuk templating
    //camelCase // Biasanya digunakan untuk nama class, method/function
    //snake_case // digunakan pada nama table
    return view('auth.template-login');
});

Route::post('/login', function () {
    return 'Terima Data Login';
});

// Semua halaman dibawah, perlu LOGIN
Route::get('/dashboard', function () {

    $titleDariFunction = '<script>alert("test")</script><span style="color: red">DASHBOARD</span>';

    $subTitle = 'Halaman Dashboard Ahli';

    $dataSenaraiAhli = [
        ['nama' => 'Ali', 'email' => 'ali@gmail.com'],
        ['nama' => 'Ali2', 'email' => 'ali2@gmail.com'],
        ['nama' => 'Ali3', 'email' => 'ali3@gmail.com'],
        ['nama' => 'Ali4', 'email' => 'ali4@gmail.com'],
    ];

    // Cara 1 Attach Data
    return view('template-dashboard')->with('titleDiTemplate', $titleDariFunction)
    ->with('subTitle', $subTitle)
    ->with('dataSenaraiAhli', $dataSenaraiAhli);
    // Cara 2 Attach Data
    // return view('template-dashboard', [
    //     'titleDiTemplate' => $titleDariFunction,
    //     'subTitle' => $subTitle,
    //     'dataSenaraiAhli' => $dataSenaraiAhli,
    // ]);
    // Cara 3 Attach Data
    // return view('template-dashboard', compact(
    //     'titleDariFunction',
    //     'subTitle',
    //     'dataSenaraiAhli'
    // ));
});

Route::get('/pesakit/daftar', function () {
    return 'Daftar Pesakit';
});

Route::post('/pesakit/daftar', function () {
    return 'Terima Data Daftar Pesakit';
});

Route::get('/pesakit/{id}', function ($id) {
    return 'Rekod pesakit';
});

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
