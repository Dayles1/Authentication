<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendEmailNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $image=$request->file('image');
        $avatar=$this->uploadFile($image,'avatar');

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'verfication_token'=>Str::random(64),
            'path'=>$avatar,
            'password'=>bcrypt($request->password),
        ]);
        Mail::to($request->email)->send(new SendEmailNotification($user));
        return response()->json([
            'success'=>true,
            'message'=>'Emailingzini tekshiring'
        ]);
    }
}
