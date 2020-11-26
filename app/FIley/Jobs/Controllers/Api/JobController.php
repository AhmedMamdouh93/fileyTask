<?php

namespace App\Filey\Jobs\Controllers\Api;
use App\Filey\ApiController;
use App\Filey\Jobs\Job;
use Illuminate\Http\Request;
use App\Filey\Jobs\Resources\JobResource;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Filey\Jobs\UseCases\JobUseCaseInterface;
use App\Filey\Jobs\Requests\CreateJobRequest;
use App\Filey\Jobs\Requests\UpdateJobRequest;
use App\Filey\Jobs\Repository\JobRepositoryInterface;
class JobController extends ApiController
{
    private $jobUseCase;
    private $jobRepo;
    public function __construct(JobUseCaseInterface $jobUseCase,JobRepositoryInterface $jobRepo)
    {
        $this->jobUseCase = $jobUseCase;
        $this->jobRepo = $jobRepo;
    }

    public function createJob(CreateJobRequest $request)
    {
        $data = request()->only([
            'title', 'required_experience','job_requirements',
            'vacancies','date_from','date_to'
        ]);
        $job = $this->jobUseCase->createJob($data);
        $collection = collect(new JobResource($job))->toArray();
        return $this->respond($collection);
    }

    public function listAvailableJobs(){
        $jobs = $this->jobRepo->listAvailableJobs();
        $pageSize = request()->has('limit')?request('limit'):10;
        return $this->respond(JobResource::collection($jobs)->paginate($pageSize));
    }

    public function updateJob(UpdateJobRequest $request ,Job $job){
        $data = request()->only([
            'title', 'required_experience','job_requirements',
            'vacancies','date_from','date_to'
        ]);
        $this->jobUseCase->updateJob($job,$data);
        return $this->respond(collect(new JobResource($job))->toArray());
    }

    public function deleteJob(Job $job){
        
        if($this->jobRepo->delete($job)){
            return $this->respondDeleted('Job Deleted Successfully');
        }
        return $this->respondInternalError();        
    }
}
