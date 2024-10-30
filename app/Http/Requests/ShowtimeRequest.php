<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowtimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'movie_title' => ['required', 'min:20'],
            'screen_name' => ['required', 'min:20'],
            'showtime_date' => ['required'],
            'time' => ['required']
        ];
    }
    // thông báo

    public function messages(){
        return [
            'movie_title.required' => 'Tên phim không được để trống',
            'movie_title.min' => 'Tên phim phải có ít nhất 20 ký tự',
            'screen_name.required' => 'Phòng chiếu không được để trống',
            'screen_name.min' => 'Phòng chiếu phải có ít nhất 20 ký tự',
            'showtime_date.required' => 'Ngày chiếu không được để trống',
            'time.required' => 'Giờ chiếu không được để trống'
        ];
    }
}
