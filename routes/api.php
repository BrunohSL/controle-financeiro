<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/auth', [AuthController::class, 'auth']);

// Accounts
Route::get('accounts/show-accounts', [AccountController::class, 'show']);
Route::post('accounts/create-account', [AccountController::class, 'create']);
Route::put('accounts/update-account', [AccountController::class, 'update']);
Route::delete('accounts/delete-account', [AccountController::class, 'kill']);
