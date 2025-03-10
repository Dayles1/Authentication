<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $avatar=$request->file('image');

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'avatar'=>$request->avatar,
            'password'=>bcrypt($request->password),
        ]);
    }
}
