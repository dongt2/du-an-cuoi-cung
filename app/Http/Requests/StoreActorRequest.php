<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActorRequest extends FormRequest
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
            'actor_name' => [
                'required',
                'string',
                'max:255',
                'unique:actors,id,',
            ],
        ];
    }

    public function messages(){
        return [
            'actor_name.required' => 'Trường diễn viên không được bỏ trống',
            'actor_name.string'  => 'Trường diễn viên phải là chuỗi ký tự',
            'actor_name.max'  => 'Trường diễn viên tối đa 255 ký tự',
            'actor_name.unique'  => 'Trường diễn viên đã tồn tại trong CSDL',
        ];
    }
}
