<?php

// Rutas para la funcionalidad de la gestión de usuario

use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class)->names('administrador.users');