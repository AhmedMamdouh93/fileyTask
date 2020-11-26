<?php

namespace App\Filey\Jobs\Repository;
use App\Filey\Jobs\Job;
use Exception;
use Illuminate\Support\Collection;
use App\Filey\BaseApp\Traits\Filterable;

class JobRepository implements JobRepositoryInterface
{
    use Filterable;

    protected $model;
    public function __construct(Job $job) {
        $this->model = $job;
    }

    /**
     * @param int $job_id
     * @return Job|null
     */
    public function find(int $job_id): ?Job
    {
        return $this->model->find($job_id);
    }

    /**
     * @param Job $job
     * @param array $data
     * @return bool
     */
    public function update(Job $job, array $data): bool
    {
        return $job->update($data);
    }


    public function all(array $filters = [])
    {
        $model = $this->applyFilters(new Job(), $filters);
        return $model->orderBy('id', 'DESC')->latest()->get();
    }

    public function listAvailableJobs(){
        return $this->model->whereDate('date_to','>=',date('Y-m-d'))->get();
    }

    /**
     * @param $id
     * @return Job|null
     */
    public function findOrFail($id): ?Job
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }


    /**
     * @param Job $job
     * @return bool
     * @throws Exception
     */
    public function delete(Job $job): bool
    {
        return $job->delete();
    }
}
