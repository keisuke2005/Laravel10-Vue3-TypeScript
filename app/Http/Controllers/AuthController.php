<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\AuthServiceInterface;

/**
 * AuthController
 * 
 * 認証コントローラークラス
 * @access public
 * @author keisuke.ueda
 * 
 */
class AuthController extends Controller
{
    public function __construct(
        private AuthServiceInterface $authService
    )
    {

    }

    public function login(Request $request)
    {
        // バリデーション
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // サービス実行
        $response = $this->authService->loginExecute($credentials);

        // レスポンス
        return $response;
    }

    public function logout()
    {
        $response = $this->authService->logoutExecute();
        return $response;
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

        // サービス実行
        $response = $this->authService->temporaryRegister(
            $request->name,
            $request->email,
            $request->password,
        );

        // レスポンス
        return $response;
    }

}