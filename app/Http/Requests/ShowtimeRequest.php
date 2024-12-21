<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowtimeRequest extends FormRequest
{
    /**
     * Determine if the theme is authorized to make this request.
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
    public function rules()
{
    return [
        'movie_id' => 'required|exists:movies,movie_id',
        'screen_id' => 'required|exists:screens,screen_id',
        'time' => 'required',
    ];
}

    // thông báo

    public function messages(){
        return [
            'movie_id.required' => 'Tên phim không được để trống',
            'movie_id.min' => 'Tên phim phải có ít nhất 20 ký tự',
            'screen_id.required' => 'Phòng chiếu không được để trống',
            'screen_id.min' => 'Phòng chiếu phải có ít nhất 20 ký tự',
            'showtime_date.required' => 'Ngày chiếu không được để trống',
            'time.required' => 'Giờ chiếu không được để trống'
        ];
    }
}
