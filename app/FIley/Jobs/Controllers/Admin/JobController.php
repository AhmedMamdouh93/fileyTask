<?php

namespace App\Filey\Jobs\Controllers\Admin;
use App\Filey\ApiController;
use App\Filey\Jobs\Job;
use Illuminate\Http\Request;
use App\Filey\Jobs\Resources\JobResource;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Filey\Jobs\Repository\JobRepositoryInterface;
use App\Filey\JobApplications\Repository\JobApplicationRepositoryInterface;
class JobController extends ApiController
{
    private $jobApplicationRepo;
    private $jobRepo;
    public function __construct(JobApplicationRepositoryInterface $jobApplicationRepo,JobRepositoryInterface $jobRepo)
    {
        $this->jobRepo = $jobRepo;
        $this->jobApplicationRepo = $jobApplicationRepo;
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = 'Jobs';
        $jobs = $this->jobRepo->all();
        return view('backend.pages.jobs.index',compact('jobs'));
    }

    public function view(Job $job){
        // dd($job);
        $title = 'Jobs';
        $applications = $job->applications;
        return view('backend.pages.job-applications.index',compact('applications','job'));
    }
}
