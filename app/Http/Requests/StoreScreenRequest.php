<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScreenRequest extends FormRequest
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
            'screen_name' => [
                'required',                    // Bắt buộc phải nhập
                'string',                      // Phải là chuỗi ký tự
                'max:255',                     // Độ dài tối đa là 255 ký tự
                'min:3',                       // Độ dài tối thiểu là 3 ký tự
                'regex:/^[a-zA-ZÀ-ỹ0-9]+([a-zA-ZÀ-ỹ0-9\s\'.\-]*)$/u', // Chỉ cho phép chữ cái, dấu cách, dấu nháy đơn, dấu gạch ngang
                'unique:screens,screen_name',  // Không được trùng với các tên đã tồn tại trong bảng screens
            ],
        ];
    }


    public function messages(): array
    {
        return [
            // Lỗi khi không nhập
            'screen_name.required' => 'Phòng phim không được để trống',

            // Lỗi khi không phải chuỗi ký tự
            'screen_name.string' => 'Phòng phim phải là chuỗi ký tự hợp lệ',

            // Lỗi khi vượt quá độ dài tối đa
            'screen_name.max' => 'Phòng phim không được vượt quá 255 ký tự',

            // Lỗi khi không đủ độ dài tối thiểu
            'screen_name.min' => 'Phòng phim phải có ít nhất 3 ký tự',

            // Lỗi khi không đúng định dạng
            'screen_name.regex' => 'Phòng phim chỉ được chứa chữ cái, số, khoảng trắng và dấu gạch ngang',

            // Lỗi khi trùng lặp
            'screen_name.unique' => 'Phòng phim đã tồn tại trong hệ thống',
        ];
    }
}
