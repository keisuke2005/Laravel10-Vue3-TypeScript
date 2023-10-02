<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\AnimalServiceInterface;
use App\Services\AnimalService;
use App\Repositories\Interfaces\AnimalRepositoryInterface;
use App\Repositories\AnimalRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AnimalServiceInterface::class, AnimalService::class);
        $this->app->bind(AnimalRepositoryInterface::class, AnimalRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
