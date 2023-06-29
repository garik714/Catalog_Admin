<?php

namespace App\Providers;

use App\Interfaces\ReadProductRepositoryInterface;
use App\Interfaces\WriteProductRepositoryInterface;
use App\Repositories\ReadProductRepository;
use App\Repositories\WriteProductRepository;
use Carbon\Laravel\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ReadProductRepositoryInterface::class, ReadProductRepository::class);
        $this->app->bind(WriteProductRepositoryInterface::class, WriteProductRepository::class);
    }

    public function boot(): void
    {
    }
}
