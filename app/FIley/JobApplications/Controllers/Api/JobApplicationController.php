<?php

namespace App\Filey\JobApplications\Controllers\Api;
use App\Filey\ApiController;
use App\Filey\JobApplications\Job;
use Illuminate\Http\Request;
use App\Filey\JobApplications\Requests\JobApplicationRequest;
use App\Filey\JobApplications\Resources\JobApplicationResource;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Filey\JobApplications\UseCases\JobApplicationUseCaseInterface;
use App\Filey\JobApplications\Repository\JobApplicationRepositoryInterface;
class JobApplicationController extends ApiController
{
    private $jobApplicationUseCase;
    private $jobApplicationRepo;
    public function __construct(JobApplicationUseCaseInterface $jobApplicationUseCase,JobApplicationRepositoryInterface $jobApplicationRepo)
    {
        $this->jobApplicationUseCase = $jobApplicationUseCase;
        $this->jobApplicationRepo = $jobApplicationRepo;
    }

    public function ApplyJob(JobApplicationRequest $request)
    {
        $data = request()->only([
            'job_id', 'fullname','age',
            'university','email','cv'
        ]);
        $jobApplication = $this->jobApplicationUseCase->applyJob($data);
        if(isset($jobApplication['error'])){
            return $jobApplication['error'];
        }
        $collection = collect(new JobApplicationResource($jobApplication))->toArray();
        return $this->respond($collection);
    }
    public function listAllJobApplications(){
        $jobApplicationss = $this->jobApplicationRepo->all();
        $pageSize = request()->has('limit')?request('limit'):10;
        return $this->respond(JobApplicationResource::collection($jobApplicationss)->paginate($pageSize));
    }




    // public function applyForJob($jobId){
    //     $data = request()->only([
    //         "expected_salary","joining_date", "contact_last_managers",
    //         "contacts","answers"
    //     ]);
    //     $data['job'] = $this->job_repo->findOneByOrFail(['id' => $jobId]);
    //     $data['user'] = auth()->user();
    //     $data['status'] = JobApplication::PENDING;
    //     $result = $this->repo->save(new JobApplication(), $data);
    //     if(isset($result->error)){
    //         return $result->error;
    //     }
    //     JobApplicationHistory::create(['user_id'=>auth()->user()->id,'job_application_id'=>$result->id,'action'=>'Applied for job']);
    //     return $this->respond(new JobApplicationResource($result,true));
    // }


    // // View job applied by loggedin user
    // public function viewAppliedJob($jobApplicationId){
    //     $user = Auth::user();
    //     $job_application =$this->repo->findOneByOrFail(['id' => $jobApplicationId,'user_id'=>$user->id]);
    //     return $this->respond(new JobApplicationResource($job_application,true)); 
    // }

    // // View all jobs applied by loggedin user
    // public function viewAllAppliedJobs(){
    //     $filters['user_id'] = Auth::user()->id;
    //     $job_applications = $this->repo->findAll($filters,[],true);
    //     $pageSize = request()->has('limit')?request('limit'):10;
    //     return $this->respond(JobApplicationResource::collection($job_applications,true)->paginate($pageSize));
    // }

   

    // public function updateJob(UpdateJobRequest $request ,Job $job){
    //     $data = request()->only([
    //         'title', 'required_experience','job_requirements',
    //         'vacancies','date_from','date_to'
    //     ]);
    //     $this->jobUseCase->updateJob($job,$data);
    //     return $this->respond(collect(new JobResource($job))->toArray());
    // }

    // public function deleteJob(Job $job){
        
    //     if($this->jobRepo->delete($job)){
    //         return $this->respondDeleted('Job Deleted Successfully');
    //     }
    //     return $this->respondInternalError();        
    // }
}
