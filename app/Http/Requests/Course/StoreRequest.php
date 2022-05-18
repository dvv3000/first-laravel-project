<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => [
                'bail', //khi gặp lỗi thì dừng lại và báo lỗi luôn chứ không validate toàn bộ các rules
                'required',
                'string',
                'unique:App\Models\Course',
            ]
        ];
    }

    public function messages() {
        return [
            'name.required/name.string' =>  ':attribute must be a string',
            'name.unique' => ':attribute is existed'
        ];
    }

    public function attributes() {
        return [
            'name' => 'Name'
        ];
    }
}
