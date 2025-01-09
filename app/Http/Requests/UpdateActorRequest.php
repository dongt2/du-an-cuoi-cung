<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActorRequest extends FormRequest
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
                'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ cái và khoảng trắng
                Rule::unique('actors', 'actor_name')->ignore($this->route('actor'), 'id'),
            ],
        ];
    }

    public function messages(){
        return [
            'actor_name.required' => 'Tên thể loại không được bỏ trống',
            'actor_name.string' => 'Tên thể loại phải là chuỗi ký tự.',
            'actor_name.max' => 'Tên thể loại không được vượt quá 255 ký tự.',
            'actor_name.regex' => 'Tên thể loại không được chứa ký tự đặc biệt.',
            'actor_name.unique' => 'Tên thể loại đã tồn tại.', // Thông báo lỗi khi bị trùng
        ];
    }
}
