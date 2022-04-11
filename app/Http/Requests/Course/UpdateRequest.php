<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateRequest extends FormRequest
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
        // dd(Course::class);
        return [
            'name' => [
                'bail',
                'required',
                'string',
                Rule::unique('courses', 'name')->ignore($this->course->id)
            ]
        ];
    }

    public function messages() {
        return [
            'name.required/name.string' =>  ':attribute must be a string',
            'name.unique' => ':attribute must is existed'
        ];
    }

    public function attributes() {
        return [
            'name' => 'Name'
        ];
    }
}
