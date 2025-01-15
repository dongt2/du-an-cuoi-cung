<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateComboRequest extends FormRequest
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
            'combo_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('combos', column: 'combo_name')->ignore($this->route('combo'), idColumn: 'combo_id'),
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ],
            'short_description' => [
                'nullable',
                'string',
            ],
            'price' => [
                'required',
                'decimal:0',
            ],
        ];
    }

    public function messages(){
        return [
            'combo_name.required' => 'Trường không được bỏ trống',
            'combo_name.string' => 'Phải là chuỗi ký tự',
            'combo_name.max' => 'Max 255',
            'combo_name.unique' => 'Tên đã tồn tại',

            'image.nullable'   =>'Ảnh đại diện có thể để trống',
            'image.image'   => 'Ảnh đại diện phải là một file ảnh',
            'image.mimes'   => 'Ảnh đại diện phải có định dạng: jpeg, png, hoặc jpg',
            'image.max'   => 'Ảnh đại diện max 2048',

            'short_description.nullable'  => 'Có thể bỏ trống',
            'short_description.string'  => 'Phải là chuỗi ký tự',
    
            'price.required' => 'Trường không thể bỏ trống',
            'price.decimal' => 'Lấy 0 số thập phân',
        ];
    }
}
