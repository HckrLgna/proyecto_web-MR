<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beneficiarios.show');
});

Route::resource('user', UserController::class);
