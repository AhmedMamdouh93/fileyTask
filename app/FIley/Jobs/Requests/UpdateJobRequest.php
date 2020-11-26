<?php

namespace App\Filey\Jobs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'title'=>'required|string',
            'required_experience'=>'required|string',
            'job_requirements'=>'required|',
            'date_from' => 'sometimes|date|before:date_to|after:'.now(),
            'date_to' => 'sometimes|date|after:date_from',
            'vacancies'=>'required|numeric'
        ];
    }
}
