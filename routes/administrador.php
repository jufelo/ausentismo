<?php

use App\Http\Controllers\Administrador\UserController;
use Illuminate\Support\Facades\Route;

// Rutas para la funcionalidad de la gestión de usuario
Route::resource('users', UserController::class)->names('administrador.users');