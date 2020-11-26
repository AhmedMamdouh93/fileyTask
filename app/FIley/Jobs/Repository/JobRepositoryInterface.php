<?php

namespace App\Filey\Jobs\Repository;
use App\Filey\Jobs\Job;
use Illuminate\Support\Collection;

interface JobRepositoryInterface
{
    public function all();

    public function listAvailableJobs();
    /**
     * @param  int  $job_id
     * @return Job|null
     */
    public function find(int $job_id): ?Job;
    


    /**
     * @param  Job  $job
     * @param  array  $data
     * @return bool
     */
    public function update(Job $job, array $data): bool;

    /**
     * @param $id
     * @return Job|null
     */
    public function findOrFail($id): ?Job;

    public function create($data);


    /**
     * @param  Job  $job
     * @return bool
     */
    public function delete(Job $job): bool;


 
}
