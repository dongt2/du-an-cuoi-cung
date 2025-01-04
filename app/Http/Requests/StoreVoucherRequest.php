<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
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
            'voucher_name' => [
                'required',
                'string',
                'max:255',
                'unique:vouchers,voucher_name',
            ],
            'code' => [
                'required',
                'string',
                'alpha_num',
                'unique:vouchers,voucher_name',
                'min:6',
                'max:20',
            ],
            'start_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:0',
            ],
            'deduct_amount' => [
                'required',
                'numeric',
                'min:0',
            ],
        ];
    }

    public function messages()
    {
        return [
            'voucher_name.required' => 'Trường không được bỏ trống',
            'voucher_name.string' => 'Phải là chuỗi ký tự',
            'voucher_name.max' => 'Max 255',
            'voucher_name.unique' => 'Đã tồn tại trong CSDL',

            'code.required' => 'Trường không được bỏ trống',
            'code.string' => 'Phải là chuỗi ký tự',
            'code.alpha_num' => 'Chỉ được chứa chữ và số',
            'code.min' => 'Min 6',
            'code.max' => 'Max 20',
            'code.unique' => 'Đã tồn tại trong CSDL',

            'start_date.required' => 'Trường không được bỏ trống',
            'start_date.date' => 'Phải đúng định dạng ngày',
            'start_date.after_or_equal' => 'Phải là ngày hôm nay hoặc sau đó.',

            'end_date.required' => 'Trường không được bỏ trống',
            'end_date.date' => 'Phải đúng định dạng ngày',
            'end_date.after_or_equal' => 'Phải sau hoặc bằng :date.',

            'quantity.required' => 'Trường không được bỏ trống',
            'quantity.integer' => 'Phải là số nguyên dương',
            'quantity.min' => 'Min 0',

            'deduct_amount.required' => 'Trường không được bỏ trống',
            'deduct_amount.numeric' => 'Phải là số',
            'deduct_amount.min' => 'Min 0',
        ];
    }
}
