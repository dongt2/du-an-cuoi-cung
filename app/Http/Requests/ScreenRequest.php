<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScreenRequest extends FormRequest
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
            'screen_name' => ['required']
        ];
    }
    // thông báo

    public function messages(){
        return [
            'screen_name.required' => 'Phòng phim không được để trống',
            'screen_name.min' => 'Phòng phim phải có ít nhất 10 ký tự',
        ];
    }
}
