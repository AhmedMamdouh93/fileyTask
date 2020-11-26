<?php


namespace App\Filey\Jobs\UseCases;


use App\Filey\Jobs\Repository\JobRepositoryInterface;
use App\Filey\Jobs\UseCases\JobUseCaseInterface;
use App\Filey\Jobs\Job;
use Illuminate\Support\Facades\Config;
use App\Filey\ApiController;
use Illuminate\Support\Facades\Auth;

class JobUseCase implements JobUseCaseInterface
{

    private $jobRepo;
    private $apiResponse;

 
    public function __construct(JobRepositoryInterface $jobRepo) {
        $this->jobRepo = $jobRepo;
        $this->apiResponse = new ApiController();
    }

    public function createJob($data)
    {
        $job = $this->jobRepo->create($data);
        return $job;
    }

    public function updateJob($job,$data)
    {   
        $this->jobRepo->update($job,$data);
    }
}
