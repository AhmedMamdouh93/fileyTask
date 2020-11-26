<?php

namespace App\Filey\Jobs;

use Illuminate\Database\Eloquent\Model;
use App\Filey\JobApplications\JobApplication;
use App\Filey\BaseApp\Traits\CreatedBy;
class Job extends Model
{
    use CreatedBy;
    protected $table = 'jobs';
    protected $fillable = [
        'title','required_experience','job_requirements',
        'date_from','date_to','vacancies','user_id'
    ];
    public function applications(){
        return $this->hasMany(JobApplication::class,'job_id');
    }
}
