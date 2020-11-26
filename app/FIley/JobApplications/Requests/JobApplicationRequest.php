<?php

namespace App\Filey\JobApplications\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'job_id'=>'required|exists:jobs,id',
            'fullname'=>'required|string',
            'age'=>'required|numeric',
            'university'=>'required|string',
            'email'=>'required|email',
            'cv'=>'required|base64pdf'
        ];
    }
}
