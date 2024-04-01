<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|max:255',
            'description'=>'required',
            'long_description'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '*標題不能為空',
            'title.max' => '*標題不能超過255個字符',
            'description.required' => '*描述不能為空',
            'long_description.required' => '*詳細描述不能為空',
        ];
    }

}
