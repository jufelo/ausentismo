<?php

use App\Http\Controllers\Administrador\EmployeeController;
use App\Http\Controllers\Administrador\IncapacityController;
use App\Http\Controllers\Administrador\RoleController;
use App\Http\Controllers\Administrador\UserController;
use Illuminate\Support\Facades\Route;

// Rutas para la funcionalidad de la gestión de roles
Route::resource('roles', RoleController::class)->names('administrador.roles');

// Rutas para la funcionalidad de la gestión de usuario
Route::resource('users', UserController::class)->names('administrador.users');

// Rutas para la funcionalidad de la gestión de empleado
Route::resource('employees', EmployeeController::class)->names('administrador.employees');

// Rutas para la funcionalidad de la gestión de incapacidad
Route::resource('incapacities', IncapacityController::class)->names('administrador.incapacities');
