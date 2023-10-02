<?php

namespace App\Services\Interfaces;

use Illuminate\Http\RedirectResponse;

interface AnimalServiceInterface
{
    public function getList($userId):array;
}