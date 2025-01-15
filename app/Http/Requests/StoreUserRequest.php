<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',

        ];
    }

    public function messages(){
        return [
            'username.required' => 'Trường tên không được bỏ trống',
            'username.unique' => 'Trường tên đã tồn tại',

            'email.required' => 'Trường email không bỏ trống',
            'email.email' => 'Trường email phải đúng định dạng',
            'email.unique' => 'Trường email đã tồn tại',

            'password.redquired' => 'Trường mật khẩu không được bỏ trống',
            'password.min' => 'Trường mật khẩu tối thiểu 6 ký tự',
        ];
    }
}
