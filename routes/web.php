<?php

use App\Http\Controllers\AldeiaController;
use App\Http\Controllers\KlienteController;
use App\Http\Controllers\KuartuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MunisipiuController;
use App\Http\Controllers\NasaunController;
use App\Http\Controllers\PostuController;
use App\Http\Controllers\RelatoriuController;
use App\Http\Controllers\SukuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.content', ['title' => 'Home', 'active' => 'home']);
    });
});

Route::resource('/nasaun', NasaunController::class);
Route::resource('/munisipiu', MunisipiuController::class); 
Route::resource('/postu', PostuController::class);
Route::resource('/suku', SukuController::class);
Route::resource('/aldeia', AldeiaController::class);
Route::resource('/kuartu', KuartuController::class);
Route::resource('/kliente', KlienteController::class);
Route::resource('/user', UserController::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');

Route::get('/relatoriu', [RelatoriuController::class, 'index'])->name('relatoriu.index');
// Route::get('/relkadatinan', [RelatoriuController::class, 'relkadatinan'])->name('relatoriu.relkadatinan');
// Route::resource('relatoriu/geral', RelatoriuController::class);