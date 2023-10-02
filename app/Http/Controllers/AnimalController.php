<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\AnimalServiceInterface;

class AnimalController extends Controller
{
    public function __construct(
        private AnimalServiceInterface $animalService,
    )
    {

    }

    public function list()
    {
        $userId = auth()->user()->id;
        $list = $this->animalService->getList($userId);
        return response()->json($list);
    }
}
