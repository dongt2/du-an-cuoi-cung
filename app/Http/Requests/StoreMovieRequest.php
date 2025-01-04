<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
            ],
            'duration' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],
            'country' => [
                'required',
                'string',
                'max:255',
            ],
            'year' => [
                'required',
                'integer',
                'digits:4',
                'between:1800,' .date('Y'),
            ],
            'director' => [
                'required',
                'string',
                'max:255',
            ],
            'actors' => [
                'required',
                'string',
                'max:255',
            ],
            'category_id' => [
                'required',
                'exists:categories,category_id'
            ],
            'description' => [
                'required',
                'string',
                'max:500',
            ],
            'trailer_url' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be|vimeo\.com)\/.+$/', // Chỉ chấp nhận URL từ YouTube hoặc Vimeo
            ],
            'release_date' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Trường title không bỏ trống',
            'title.string'   => 'Phải là một chuối ký tự',
            'title.max'      => 'Tối đa 255 ký tự',

            'cover_image.nullable'   =>'Ảnh đại diện có thể để trống',
            'cover_image.image'   => 'Ảnh đại diện phải là một file ảnh',
            'cover_image.mimes'   => 'Ảnh đại diện phải có định dạng: jpeg, png, hoặc jpg',
            'cover_image.max'   => 'Ảnh đại diện max 2048',

            'duration.required' => 'Trường không được bỏ trống',
            'duration.integer' => 'Trường phải là số nguyên',
            'duration.min' => 'Min 1 ký tự',
            'duration.max' => 'Max 1000 ký tự',

            'country.required'  => 'Trường không được bỏ trống',
            'country.string'  => 'Trường phải là một chuỗi',
            'country.max'  => 'Max 255 ký tự',

            'year.required'  => 'Trường không được bỏ trống',
            'year.integer'  => 'Trường năm phải là số nguyên',
            'year.digits'  => 'Trường năm phải có đúng 4 chữ số',
            'year.between'  => 'Trường năm phải nằm trong khoảng từ 1900 đến '.date('Y').'.',

            'director.required'  => 'Trường không được bỏ trống',
            'director.string'  => 'Trường phải là một chuỗi',
            'director.max'  => 'Max 255 ký tự',

            'actors.required'  => 'Trường không được bỏ trống',
            'actors.string'  => 'Trường phải là một chuỗi',
            'actors.max'  => 'Max 255 ký tự',

            'category_id.required' => 'Trường thể loại không bỏ trống',
            'category_id.exists'   => 'Id đã có',

            'description.required'  => 'Trường không được bỏ trống',
            'description.string'  => 'Trường phải là một chuỗi',
            'description.max'  => 'Max 500 ký tự',

            'trailer_url.nullable'  => 'Có thể bỏ trống',
            'trailer_url.url'  => 'Trường URL của trailer phải là một URL hợp lệ.',
            'trailer_url.regex'  => 'URL của trailer phải thuộc YouTube hoặc Vimeo.',

            'release_date.required' => 'Trường không được bỏ trống',
            'release_date.date' => 'Trường ngày xuất bản phải là một ngày hợp lệ',
            'release_date.before_or_equal' => 'Điền ngày hợp lệ',

        ];
    }
}
