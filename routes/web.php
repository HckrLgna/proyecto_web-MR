<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\InformeAcademicoController;
use App\Http\Controllers\InformeEducadorController;
use App\Http\Controllers\FichaClinicaController;
use App\Http\Controllers\DatosIngresoController;
use App\Http\Controllers\AlertasController;
use App\Http\Controllers\EstadisticasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware'=> 'auth'],function (){
    Route::get('user/educador', [UserController::class, 'indexEducador'])->name('user.educador');
    Route::resource('user', UserController::class);

    Route::resource('beneficiario', BeneficiarioController::class);
    Route::post('beneficiario/ingreso', [BeneficiarioController::class, 'ingresoStore'])->name('beneficiario.ingresoStore');
    Route::resource('alerta', AlertasController::class);

    Route::resource('informeEducador', InformeEducadorController::class);
    Route::post('informeEducador/alerta',[InformeEducadorController::class, 'alertaStore'])->name('informeEducador.alertaStore');
    Route::resource('informeAcademico', InformeAcademicoController::class);
    Route::resource('fichaClinica', FichaClinicaController::class);
    Route::resource('datosIngreso', DatosIngresoController::class);

    Route::get('estadisticas',[EstadisticasController::class, 'index'])->name('estadisticas.index');
    Route::get('estadisticas/alerta',[EstadisticasController::class, 'alertaIndex'])->name('estadisticas_alerta.index');
    Route::get('estadisticas/informeEducador',[EstadisticasController::class, 'informeEducadorIndex'])->name('estadisticas_informe_educador.index');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
