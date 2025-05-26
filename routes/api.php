<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', [AuthController::class, 'auth']);

// Accounts
Route::get('/accounts/show-accounts', [AccountController::class, 'show']);
Route::get('/accounts/create-account', [AccountController::class, 'create']);
