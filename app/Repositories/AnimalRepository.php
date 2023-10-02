<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AnimalRepositoryInterface;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

readonly class AnimalRepository implements AnimalRepositoryInterface
{
    public function findByUserId($userId):Collection
    {
        $animals = Animal::where('user_id', $userId)->get();
        return $animals;
    }
}