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
                'min:1',
                'max:255',
                'unique:movies,title',
            ],
            'duration' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'country' => [
                'required',
                'string',
                'min:1',
                'max:255',
                'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ cái và khoảng trắng
            ],
            'description' => [
                'required',
                'string',
                'min:3',
                'max:500',
                'regex:/^[^<>]*$/', // Không cho phép các ký tự '<' và '>'
            ],
            'year' => [
                'required',
                'integer',
                'digits:4',       // Phải đúng 4 chữ số
                'between:1900,'.date('Y'),  // Nằm trong khoảng từ 1900 đến năm hiện tại
            ],
            'release_date' => [
                'required',
                'date',

            ],
            'actors' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'image' => [
                'required',                 // Bắt buộc có ảnh
                'image',                    // Phải là một file ảnh
                'mimes:jpeg,png,jpg',       // Định dạng file là jpeg, png hoặc jpg
            ],
            'trailer_url' => [
                'required',               // Bắt buộc phải có giá trị
                'url',                    // Phải là URL hợp lệ
                'max:255',                // Giới hạn độ dài URL không quá 255 ký tự
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be|vimeo\.com)\/.+$/', // Chỉ chấp nhận URL từ YouTube hoặc Vimeo
            ],
            'category_id' => [
                'required',
            ],
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Trường tên không được bỏ trống',
            'title.string' => 'Trường tên phải là chuỗi ký tự.',
            'title.min' => 'Trường tên phải có ít nhất 3 ký tự.',
            'title.max' => 'Trường tên không được vượt quá 255 ký tự.',
            'title.unique' => 'Tên phim đã tồn tại.', // Thông báo lỗi khi bị trùng

            'duration.required' => 'Trường thời lượng không được bỏ trống',
            'duration.string' => 'Trường thời lượng phải là chuỗi ký tự.',
            'duration.min' => 'Trường thời lượng phải có ít nhất 3 ký tự.',
            'duration.max' => 'Trường thời lượng không được vượt quá 255 ký tự.',

            'country.required' => 'Trường quốc gia không được bỏ trống',
            'country.string' => 'Trường quốc gia phải là chuỗi ký tự.',
            'country.min' => 'Trường quốc gia phải có ít nhất 3 ký tự.',
            'country.max' => 'Trường quốc gia không được vượt quá 255 ký tự.',
            'country.regex' => 'Trường quốc gia không được chứa ký tự đặc biệt.',

            'description.required' => 'Trường mô tả không được bỏ trống.',
            'description.string' => 'Trường mô tả phải là chuỗi ký tự.',
            'description.min' => 'Trường mô tả phải có ít nhất 10 ký tự.',
            'description.max' => 'Trường mô tả không được vượt quá 500 ký tự.',
            'description.regex' => 'Trường mô tả không được chứa các ký tự đặc biệt như < hoặc >.',

            'year.required' => 'Trường năm không được bỏ trống.',
            'year.integer' => 'Trường năm phải là số nguyên.',
            'year.digits' => 'Trường năm phải có đúng 4 chữ số.',
            'year.between' => 'Trường năm phải nằm trong khoảng từ 1900 đến '.date('Y').'.',

            'release_date.required' => 'Trường ngày xuất bản không được bỏ trống',
            'release_date.date' => 'Trường ngày xuất bản phải là một ngày hợp lệ.',

            'actors.required' => 'Trường diễn viên không được bỏ trống',
            'actors.string' => 'Trường diễn viên phải là chuỗi ký tự.',
            'actors.min' => 'Trường diễn viên phải có ít nhất 3 ký tự.',
            'actors.max' => 'Trường diễn viên không được vượt quá 255 ký tự.',

            'image.required' => 'Ảnh đại diện là bắt buộc.',
            'image.image' => 'Ảnh đại diện phải là một file ảnh.',
            'image.mimes' => 'Ảnh đại diện phải có định dạng: jpeg, png, hoặc jpg.',

            'trailer_url.required' => 'Trường URL của trailer không được bỏ trống.',
            'trailer_url.url' => 'Trường URL của trailer phải là một URL hợp lệ.',
            'trailer_url.max' => 'Trường URL của trailer không được vượt quá 255 ký tự.',
            'trailer_url.regex' => 'URL của trailer phải thuộc YouTube hoặc Vimeo.',

            'category_id.required' => 'Trường thể loại không được bỏ trống',

        ];
    }
}
