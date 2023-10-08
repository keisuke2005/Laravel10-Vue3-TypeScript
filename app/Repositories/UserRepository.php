<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

readonly class UserRepository implements UserRepositoryInterface
{
    public function store(array $data):bool
    {
        try 
        {
            $user = User::create($data);
            return true;
        }
        catch(\Exception $e)
        {
            return false;
        }
        
    }
}