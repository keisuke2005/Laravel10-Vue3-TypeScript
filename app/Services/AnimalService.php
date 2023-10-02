<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;
use App\Services\Interfaces\AnimalServiceInterface;
use App\Repositories\Interfaces\AnimalRepositoryInterface;

readonly class AnimalService implements AnimalServiceInterface
{
    public function __construct(
        private AnimalRepositoryInterface $animalRepository,
    )
    {

    }
    /**
     * example
     */
    public function getList($userId):array
    {
        $animals = $this->animalRepository->findByUserId($userId);
        return [
            'animals' => $animals
        ];
    }
}      