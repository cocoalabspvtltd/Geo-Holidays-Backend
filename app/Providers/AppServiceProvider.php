<?php

namespace App\Providers;

use App\Interfaces\ApiRepositoryInterface;
use App\Repositories\ApiRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ApiRepositoryInterface::class,ApiRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
