<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return response()->json(['status_code' => 200,'message' => 'success'],200);
        } else {
            return response()->json(['status_code' => 500,'message' => 'Unauthorized'],200);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['status_code' => 200,'message' => 'Logged out'], 200);
    }

    public function register(Request $request)
    {
        /*
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        */

        $user = User::create([
            'name' => "hoge",
            'email' => "ukei2021@ymail.ne.jp",
            'password' => bcrypt('password'),
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));
        dd(1);

        $token = $user->createToken('appToken')->plainTextToken;

        return response(['user' => $user, 'token' => $token], 201);
    }

}