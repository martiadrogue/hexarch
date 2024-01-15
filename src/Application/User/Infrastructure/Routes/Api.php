<?php

use Illuminate\Support\Facades\Route;
use Src\Application\User\Infrastructure\Controllers\UserDestroyController;
use Src\Application\User\Infrastructure\Controllers\UserStoreController;

Route::get('/' , UserIndexController::class);

Route::get('/{id}' , UserShowController::class);

Route::post('/' , UserStoreController::class);

Route::delete('/{id}' , UserDestroyController::class);

Route::put('/{id}' , UserUpdateController::class);
