<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PassportsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'user_id' => 'nullable',
            'series' => 'string|min:1|nullable',
            'room' => 'string|min:1|nullable',
            'department_code' => 'string|min:1|nullable',
            'issued_by' => 'nullable',
            'place_residence' => 'string|min:1|nullable',
            'pdf1' => 'string|min:1|nullable',
            'pdf2' => 'string|min:1|nullable',
            'verified' => 'string|min:1|nullable',
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['user_id', 'series', 'room', 'department_code', 'issued_by', 'place_residence', 'pdf1', 'pdf2', 'verified']);

        return $data;
    }

}