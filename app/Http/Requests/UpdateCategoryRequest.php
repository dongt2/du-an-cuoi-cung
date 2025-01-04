<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'category_name' => [
                'required',
                'string',
                'min:1',
                'max:25',
                'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ cái và khoảng trắng
                Rule::unique('categories', 'category_name')->ignore($this->route('category'), 'category_id'),
            ],
        ];
    }

    public function messages(){
        return [
            'category_name.required' => 'Tên thể loại không được bỏ trống',
            'category_name.string' => 'Tên thể loại phải là chuỗi ký tự.',
            'category_name.min' => 'Tên thể loại phải có ít nhất 3 ký tự.',
            'category_name.max' => 'Tên thể loại không được vượt quá 25 ký tự.',
            'category_name.regex' => 'Tên thể loại không được chứa ký tự đặc biệt.',
            'category_name.unique' => 'Tên thể loại đã tồn tại.', // Thông báo lỗi khi bị trùng
        ];
    }
}
