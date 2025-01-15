<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDirectorRequest extends FormRequest
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
                'required',                     // Bắt buộc phải nhập
                'string',                       // Phải là chuỗi ký tự
                'max:255',                      // Độ dài tối đa 255 ký tự
                'min:3',                        // Độ dài tối thiểu 3 ký tự
                'regex:/^[\pL\s\'\-]+$/u',      // Chỉ cho phép chữ cái, khoảng trắng, dấu nháy đơn, dấu gạch ngang
                Rule::unique('actors', 'actor_name')->ignore($this->route('actor'), 'id'), // Kiểm tra tính duy nhất
            ],
        ];
    }
    public function messages(): array
    {
        return [
            // Trường bắt buộc
            'directors.required' => 'Trường đạo diễn không được để trống',

            // Kiểu dữ liệu
            'directors.string' => 'Trường đạo diễn phải là chuỗi ký tự',

            // Độ dài
            'directors.max' => 'Trường đạo diễn tối đa 255 ký tự',
            'directors.min' => 'Trường đạo diễn phải có ít nhất 3 ký tự',

            // Định dạng
            'directors.regex' => 'Trường đạo diễn chỉ được chứa chữ cái, dấu cách, dấu nháy đơn và dấu gạch ngang',

            // Trùng lặp
            'directors.unique' => 'Trường đạo diễn đã tồn tại trong cơ sở dữ liệu',
        ];
    }
}
