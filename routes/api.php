<?php

use App\Models\User;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('register/',[AuthController::class,'register']);
Route::get('/verify-email', [AuthController::class, 'verifyEmail']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
