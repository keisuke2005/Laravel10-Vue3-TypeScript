<?php

namespace App\Services\Interfaces;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

interface AuthServiceInterface
{
    public function temporaryRegister(string $name,string $email,string $password):JsonResponse;
    public function loginExecute(array $credentials):JsonResponse;
    public function logoutExecute():JsonResponse;
}