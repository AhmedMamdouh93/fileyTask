<?php


namespace App\Filey\JobApplications\UseCases;


use App\Filey\Jobs\Repository\JobRepositoryInterface;
use App\Filey\JobApplications\Repository\JobApplicationRepositoryInterface;
use App\Filey\JobApplications\JobApplication;
use Illuminate\Support\Facades\Config;
use App\Filey\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Filey\JobApplications\UseCases\JobApplicationUseCaseInterface;
use File;
class JobApplicationUseCase implements JobApplicationUseCaseInterface
{

    private $jobRepo;
    private $jobApplicationRepo;
    private $apiResponse;

 
    public function __construct(JobApplicationRepositoryInterface $jobApplicationRepo,JobRepositoryInterface $jobRepo) {
        $this->jobRepo = $jobRepo;
        $this->jobApplicationRepo = $jobApplicationRepo;
        $this->apiResponse = new ApiController();
    }


    public function applyJob($data){
        // dd(
        $validations = $this->validateJobApplication($data);
        if(isset($validations['error'])){
            return $validations;
        }
        $data['cv'] = $this->saveBase64Pdf($data['cv']);
        $jobApplication = $this->jobApplicationRepo->create($data);
        return $jobApplication;
    }

    private function validateJobApplication($data){
        $already_applied = $this->jobApplicationRepo->findOneBy([
            'user_id'=>auth()->user()->id,
            'job_id'=>$data['job_id']
        ]);
        if($already_applied){
            $validations['error'] = $this->apiResponse->respondExist("Already Applied to this job");
            return $validations;
        }
        return true;
    }
    private function saveBase64Pdf($file){
        $file = explode(',', $file);
        $base = base64_decode($file[1]);  
        $base64 = time().'.pdf';
        $destinationPath = "storage/uploads/cv/" . $base64;             
        file_put_contents($destinationPath, $base);
        return $base64;
    }


}
