<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectorRequest extends FormRequest
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
            'directors' => [
                'required',
                'string',
                'max:255',
                'unique:directors,id,',
            ],
        ];
    }

    public function messages(){
        return [
            'directors.required' => 'Trường đạo diễn không được bỏ trống',
            'directors.string'  => 'Trường đạo diễn phải là chuỗi ký tự',
            'directors.max'  => 'Trường đạo diễn tối đa 255 ký tự',
            'directors.unique'  => 'Trường đạo diễn đã tồn tại trong CSDL',
        ];
    }
}
