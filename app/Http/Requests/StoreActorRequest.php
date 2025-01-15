<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                'required',                     // Bắt buộc phải nhập
                'string',                       // Phải là chuỗi ký tự
                'max:255',                      // Độ dài tối đa là 255 ký tự
                'min:3',                        // Độ dài tối thiểu là 3 ký tự
                'regex:/^[a-zA-ZÀ-ỹ\s\'.\-]+$/u', // Chỉ cho phép chữ cái, dấu cách, dấu nháy, dấu gạch ngang
                Rule::unique('actors', 'actor_name')->ignore($this->route('actor'), 'id'), // Kiểm tra trùng lặp
            ],
        ];
    }
    public function messages(): array
    {
        return [
            // Trường bắt buộc
            'actor_name.required' => 'Trường diễn viên không được để trống',

            // Kiểu dữ liệu
            'actor_name.string' => 'Trường diễn viên phải là chuỗi ký tự',

            // Độ dài
            'actor_name.max' => 'Trường diễn viên tối đa 255 ký tự',
            'actor_name.min' => 'Trường diễn viên phải có ít nhất 3 ký tự',

            // Định dạng
            'actor_name.regex' => 'Trường diễn viên chỉ được chứa chữ cái, dấu cách, dấu nháy đơn và dấu gạch ngang',

            // Trùng lặp
            'actor_name.unique' => 'Trường diễn viên đã tồn tại trong cơ sở dữ liệu',
        ];
    }
}
