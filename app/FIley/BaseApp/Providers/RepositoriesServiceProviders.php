<?php

namespace App\Filey\BaseApp\Providers;
use Illuminate\Support\ServiceProvider;
use App\Filey\Users\Repository\UserRepository;
use App\Filey\Users\Repository\UserRepositoryInterface;

use App\Filey\Jobs\Repository\JobRepository;
use App\Filey\Jobs\Repository\JobRepositoryInterface;

use App\Filey\JobApplications\Repository\JobApplicationRepository;
use App\Filey\JobApplications\Repository\JobApplicationRepositoryInterface;

class RepositoriesServiceProviders extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            JobRepositoryInterface::class,
            JobRepository::class
        );
        $this->app->bind(
            JobApplicationRepositoryInterface::class,
            JobApplicationRepository::class
        );
    }
}
