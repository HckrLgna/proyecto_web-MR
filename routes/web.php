<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BeneficiarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('beneficiario', BeneficiarioController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
