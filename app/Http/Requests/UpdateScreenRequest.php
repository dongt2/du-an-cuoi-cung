<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateScreenRequest extends FormRequest
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
                'required',
                'string',
                'max:255',
                Rule::unique('screens', 'screen_name')->ignore($this->route('screen'), 'screen_id'),
            ],
        ];
    }

    public function messages()
    {
        return [
            'screen_name.required' => 'Phòng phim không được để trống',
            'screen_name.string' => 'Phòng phim phải là chuỗi ký tự',
            'screen_name.max' => 'Phòng phim không được vượt quá 255 ký tự',
            'screen_name.unique' => 'Phòng phim đã tồn tại',
        ];
    }
}
