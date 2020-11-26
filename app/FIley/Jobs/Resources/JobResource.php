<?php

namespace App\Filey\Jobs\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Filey\JobApplications\Resources\JobApplicationResource;
class JobResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        return [
            $this->attributes([
                'id','title','required_experience','job_requirements',
                'date_from','date_to','vacancies'
            ]),
            'is_applied'=>$this->when(
                $this->creator->id == auth()->user()->id,
                $this->applications()->where('user_id',auth()->user()->id)
                    ->first()?true:false
            ),
            'applications'=>$this->when(
                $this->creator->is_admin == 1,
                JobApplicationResource::collection($this->applications)
            )
        ];
    }
}
