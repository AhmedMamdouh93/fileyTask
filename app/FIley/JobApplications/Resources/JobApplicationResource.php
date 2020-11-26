<?php

namespace App\Filey\JobApplications\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Filey\Users\Resources\UserResource;
use App\Filey\Jobs\Resources\JobResource;

class JobApplicationResource extends JsonResource
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
                'id','fullname','age',
                'university'
            ]),
            'cv'=>asset('storage/uploads/cv/'.$this->cv),
            'user'=>$this->when(auth()->user()->is_admin == 1,UserResource::make($this->creator)),
            'job'=>JobResource::make($this->job)
        ];
    }
}
