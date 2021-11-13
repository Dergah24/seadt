<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HallCreateRequest extends FormRequest
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
            'title_az'=>'required|min:3',
            'title_en'=>'required|min:3',
            'title_ru'=>'required|min:3',
            'content_az'=>"required|min:3",
            'content_en'=>"required|min:3",
            'content_ru'=>"required|min:3",
            'photo'=>'required|mimes:jpg,jpeg,png'
        ];
    }

    public function attributes(){
        return [
            'title_az'=>'Başlıq az',
            'title_en'=>'Başlıq en',
            'title_ru'=>'Başlıq ru',
            'content_az'=>"Kontent az",
            'content_en'=>"Kontent en",
            'content_ru'=>"Kontent ru",
            'photo'=>"Photo"
        ];
    }
}
