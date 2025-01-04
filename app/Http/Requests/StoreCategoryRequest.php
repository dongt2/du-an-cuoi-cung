<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
                'max:50',
                'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ cái và khoảng trắng
                'unique:categories,category_name', // Kiểm tra trùng tên trong bảng `categories`
            ],
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên thể loại không được bỏ trống',
            'category_name.string' => 'Tên thể loại phải là chuỗi ký tự.',
            'category_name.min' => 'Tên thể loại phải có ít nhất 3 ký tự.',
            'category_name.max' => 'Tên thể loại không được vượt quá 50 ký tự.',
            'category_name.regex' => 'Tên thể loại không được chứa ký tự đặc biệt.',
            'category_name.unique' => 'Tên thể loại đã tồn tại.', // Thông báo lỗi khi bị trùng
        ];
    }
}
