<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\InformeAcademicoController;
use App\Http\Controllers\InformeEducadorController;
use App\Http\Controllers\FichaClinicaController;
use App\Http\Controllers\DatosIngresoController;
use App\Http\Controllers\AlertasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=> 'auth'],function (){
    Route::get('user/educador', [UserController::class, 'indexEducador'])->name('user.educador');
    Route::resource('user', UserController::class);

    Route::resource('beneficiario', BeneficiarioController::class);
    Route::post('beneficiario/ingreso', [BeneficiarioController::class, 'ingresoStore'])->name('beneficiario.ingresoStore');
    Route::resource('alerta', AlertasController::class);
});



Route::resource('informeEducador', InformeEducadorController::class)->middleware('auth');
Route::resource('informeAcademico', InformeAcademicoController::class)->middleware('auth');
Route::resource('fichaClinica', FichaClinicaController::class)->middleware('auth');
Route::resource('datosIngreso', DatosIngresoController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
