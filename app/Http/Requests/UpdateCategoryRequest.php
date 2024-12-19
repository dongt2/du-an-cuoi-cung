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
            'category_name.required' => 'Trường tên không được bỏ trống',
            'category_name.string' => 'Trường tên phải là chuỗi ký tự.',
            'category_name.min' => 'Trường tên phải có ít nhất 3 ký tự.',
            'category_name.max' => 'Trường tên không được vượt quá 25 ký tự.',
            'category_name.regex' => 'Trường tên không được chứa ký tự đặc biệt.',
            'category_name.unique' => 'Tên danh mục đã tồn tại.', // Thông báo lỗi khi bị trùng
        ];
    }
}
