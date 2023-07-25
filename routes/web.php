<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\InformeAcademicoController;
use App\Http\Controllers\InformeEducadorController;
use App\Http\Controllers\FichaClinicaController;
use App\Http\Controllers\DatosIngresoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', UserController::class)->middleware('auth');
Route::resource('beneficiario', BeneficiarioController::class)->middleware('auth');
Route::resource('informeEducador', InformeEducadorController::class)->middleware('auth');
Route::resource('informeAcademico', InformeAcademicoController::class)->middleware('auth');
Route::resource('fichaClinica', FichaClinicaController::class)->middleware('auth');
Route::resource('datosIngreso', DatosIngresoController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
