<?php

use Illuminate\Http\Request;
use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('register/',[AuthController::class,'register']);
Route::get('/verify-email', [AuthController::class, 'verifyEmail']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/email', function (Request $request) {
    $user=User::where('email',$request->email)->first();
    if($user){
    Mail::to($user->email)->send(new SendEmailNotification($user));
    return response()->json([
        'success'=>true,
        'message'=>'Emailingizni tekshiring'
    ]);
    }
    return response()->json([
        'success'=>false,
        'message'=>'Emailingiz topilmadi'
    ]);
});