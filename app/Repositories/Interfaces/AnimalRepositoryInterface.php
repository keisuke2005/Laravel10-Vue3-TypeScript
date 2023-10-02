<?php

namespace App\Repositories\Interfaces;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Collection;

interface AnimalRepositoryInterface
{
    public function findByUserId($userId):Collection;
}