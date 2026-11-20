<?php

use App\Http\Controllers\BlocsController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccinsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('roles', RolesController::class);
Route::apiResource('permissions', PermissionsController::class);
Route::apiResource('blocs', BlocsController::class);
Route::apiResource('vaccins', VaccinsController::class);
Route::apiResource('commandes', CommandesController::class);
Route::apiResource('produits', ProduitsController::class);

// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::put('/user/{id}', [UserController::class, 'update']);
// Route::patch('/user/{id}', [UserController::class, 'update']);
// Route::delete('/user/{id}', [UserController::class, 'destroy']);
