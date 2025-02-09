<?php

namespace App\Providers;

use App\Domain\Repositories\ExamRepository;
use Illuminate\Support\ServiceProvider;
use App\Domain\Services\PersistenceService;
use App\Repositories\RemoteExamRepository;
use App\Services\QuestionLocalService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(
            ExamRepository::class,
            RemoteExamRepository::class
        );

        $this->app->bind(
            PersistenceService::class,
            QuestionLocalService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
