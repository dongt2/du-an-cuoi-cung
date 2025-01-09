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
            'movie_id' => 'required|exists:movies,movie_id',
            'screen_id' => 'required|exists:screens,screen_id',
            'showtime_date' => 'required|after_or_equal:today',
            'time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'movie_id.required' => 'Tên phim không được để trống',
            'screen_id.required' => 'Phòng chiếu không được để trống',
            'showtime_date.required' => 'Ngày chiếu không được để trống',
            'showtime_date.after_or_equal' => 'Vui lòng chọn lại',
            'time.required' => 'Giờ chiếu không được để trống',
            'time.after_or_equal' => 'Chọn thời chiếu trên thời điểm hiện tại',
        ];
    }



}
