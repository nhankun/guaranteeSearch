<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class gcsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_guarantee' =>'required',
            'start_day' =>'required',
            'end_day' =>'required',
            'user_id' =>'required',
            'service_id' =>'required',
            'doctor_id' =>'required',
            'tooth_unit' =>'required',
            'note' =>'max:255',
            'image_before' =>'required|mimes:jpeg,bmp,png',
            'image_doing' =>'required|mimes:jpeg,bmp,png',
            'image_complete' =>'required|mimes:jpeg,bmp,png'
        ];
    }
}
