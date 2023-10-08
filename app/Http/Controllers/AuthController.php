<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\Interfaces\AuthServiceInterface;

class AuthController extends Controller
{
    public function __construct(
        private AuthServiceInterface $authService
    )
    {

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return response()->json(['status_code' => 200,'message' => 'success'],200);
        }
        return response()->json(['status_code' => 500,'message' => 'Unauthorized'],200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['status_code' => 200,'message' => 'Logged out'], 200);
    }

    public function register(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $data = $request->only('name', 'email', 'password');

        // 処理
        $response = $this->authService->temporaryRegister(
            $request->name,
            $request->email,
            $request->password,
        );

        return $response;
    }

}