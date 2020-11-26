<?php

namespace App\Filey\BaseApp\Providers;

use App\Filey\Users\UseCases\UserUseCase;
use App\Filey\Users\UseCases\UserUseCaseInterface;

use App\Filey\Jobs\UseCases\JobUseCase;
use App\Filey\Jobs\UseCases\JobUseCaseInterface;

use App\Filey\JobApplications\UseCases\JobApplicationUseCase;
use App\Filey\JobApplications\UseCases\JobApplicationUseCaseInterface;

use Illuminate\Support\ServiceProvider;

class UseCasesServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            UserUseCaseInterface::class,
            UserUseCase::class
        );

        $this->app->bind(
            JobUseCaseInterface::class,
            JobUseCase::class
        );

        $this->app->bind(
            JobApplicationUseCaseInterface::class,
            JobApplicationUseCase::class
        );
    }
}
