<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreShowtimeRequest extends FormRequest
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
            'movie_id' => [
                'required',                     // Bắt buộc phải nhập
                'exists:movies,movie_id',       // Phải tồn tại trong bảng movies
            ],
            'screen_id' => [
                'required',                     // Bắt buộc phải nhập
                'exists:screens,screen_id',     // Phải tồn tại trong bảng screens
            ],
            'showtime_date' => [
                'required',                     // Bắt buộc phải nhập
                'date',                         // Phải là định dạng ngày hợp lệ
                'after_or_equal:today',         // Không được chọn ngày trong quá khứ
            ],
            'time' => [
                'required',                     // Bắt buộc phải nhập
                'date_format:H:i',              // Phải đúng định dạng giờ (HH:mm)
                      // Phải sau hoặc bằng thời gian hiện tại
            ],
        ];
    }


    public function messages(): array
    {
        return [
            // movie_id
            'movie_id.required' => 'Tên phim không được để trống',
            'movie_id.exists' => 'Tên phim không tồn tại trong hệ thống',

            // screen_id
            'screen_id.required' => 'Phòng chiếu không được để trống',
            'screen_id.exists' => 'Phòng chiếu không tồn tại trong hệ thống',

            // showtime_date
            'showtime_date.required' => 'Ngày chiếu không được để trống',
            'showtime_date.date' => 'Ngày chiếu phải là định dạng ngày hợp lệ (YYYY-MM-DD)',
            'showtime_date.after_or_equal' => 'Ngày chiếu phải từ hôm nay trở đi',

            // time
            'time.required' => 'Giờ chiếu không được để trống',
            'time.date_format' => 'Giờ chiếu phải đúng định dạng HH:mm (ví dụ: 14:30)',
            'time.after_or_equal' => 'Giờ chiếu phải sau hoặc bằng thời gian hiện tại',
        ];
    }
}
