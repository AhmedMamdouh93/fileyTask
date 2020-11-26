<?php

namespace App\Filey\Jobs\UseCases;
use App\Filey\Jobs\Job;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface JobUseCaseInterface
{
    public function createJob($data);
}
