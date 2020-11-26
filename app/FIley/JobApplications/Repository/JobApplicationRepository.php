<?php

namespace App\Filey\JobApplications\Repository;
use App\Filey\JobApplications\JobApplication;
use Exception;
use Illuminate\Support\Collection;
use App\Filey\BaseApp\Traits\Filterable;

class JobApplicationRepository implements JobApplicationRepositoryInterface
{
    use Filterable;

    protected $model;
    public function __construct(JobApplication $job_application) {
        $this->model = $job_application;
    }

    /**
     * @param int $job_id
     * @return JobApplication|null
     */
    public function find(int $application_id): ?JobApplication
    {
        return $this->model->find($application_id);
    }

    public function findOneBy($conditions){
        return $this->model->where($conditions)->first();
    }
  
    public function all(array $filters = [])
    {
        $model = $this->applyFilters(new JobApplication(), $filters);
        return $model->orderBy('id', 'DESC')->get();
    }

   
    /**
     * @param $id
     * @return JobApplication|null
     */
    public function findOrFail($id): ?JobApplication
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
