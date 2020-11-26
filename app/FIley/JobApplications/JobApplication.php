<?php

namespace App\Filey\JobApplications;

use Illuminate\Database\Eloquent\Model;
use App\Filey\BaseApp\Traits\CreatedBy;
use App\Filey\Jobs\Job;
class JobApplication extends Model
{
    use CreatedBy;
    protected $table = 'job_applications';
    protected $fillable = [
        'fullname','age','job_id',
        'university','email','cv','user_id'
    ];

   public function job(){
       return $this->belongsTo(Job::class,'job_id');
   }
}
