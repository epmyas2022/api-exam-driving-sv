<?php

namespace App\Providers;

use App\Http\Requests\v1\PersonalRequest;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PersonalRepositoryImpl;
use App\Services\PersonalServices;
use App\Repositories\UserRepositoryImpl;
use App\Services\UserServices;
use App\Services\AuthServices;
class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
