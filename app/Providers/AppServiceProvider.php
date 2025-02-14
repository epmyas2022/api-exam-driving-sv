<?php

namespace App\Providers;

use App\Domain\Repositories\ExamRepository;
use App\Domain\Repositories\PersistenceRepository;
use App\Repositories\LocalExamRepository;
use App\Repositories\QuestionLocalRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RemoteExamRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(
            ExamRepository::class,
            LocalExamRepository::class
        );

        $this->app->bind(
            PersistenceRepository::class,
            QuestionLocalRepository::class
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
