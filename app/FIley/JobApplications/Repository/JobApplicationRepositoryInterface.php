<?php

namespace App\Filey\JobApplications\Repository;
use App\Filey\JobApplications\JobApplication;
use Illuminate\Support\Collection;

interface JobApplicationRepositoryInterface
{
    public function all();

    public function find(int $job_application_id): ?JobApplication;

    public function findOrFail($id): ?JobApplication;

    public function create($data); 
    public function findOneBy($conditions);
}
