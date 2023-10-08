<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;
use App\Services\Interfaces\AuthServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

readonly class AuthService implements AuthServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {

    }
    /**
     * example
     */
    public function temporaryRegister(string $name,string $email,string $password):JsonResponse
    {
        try
        {
            $token = Str::random(60);
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'email_verified_at' => Carbon::now(),
                'email_verify_token' => $token,
            ];


            $result = $this->userRepository->store($data);
    
            if(!$result)
            {
                throw new Exception("データベースの登録に失敗しました。");
            }


            $mail = new VerifyEmail($name,$token);
            Mail::to($email)->send($mail);

            return response()->json(['success' => true], 200);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
        
    }
}      