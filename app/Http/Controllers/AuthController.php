<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $image=$request->file('image');
        $avatar=$this->uploadFile($image,'avatar');

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'avatar'=>$request->avatar,
            'password'=>bcrypt($request->password),
        ]);
        Mail::to($request->email)->send(new SendEmailNotification());
        return response()->json([
            'success'=>true,
            'message'=>'Emailingzini tekshiring'
        ]);
    }
}
