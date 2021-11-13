<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InnerEventUpdate extends FormRequest
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
            'event_id'=>'required',
            'title_az'=>'min:3',
            'title_en'=>'min:3',
            'title_ru'=>'min:3',
            'content_az'=>"min:3",
            'content_en'=>"min:3",
            'content_ru'=>"min:3",
            'fileToUpload'=>'required|mimes:jpg,jpeg,png'
        ];
    }

    public function attributes(){
        return [
            'event_id'=>'Event',
            'title_az'=>'Başlıq az',
            'title_en'=>'Başlıq en',
            'title_ru'=>'Başlıq ru',
            'content_az'=>"Kontent az",
            'content_en'=>"Kontent en",
            'content_ru'=>"Kontent ru",
            'fileToUpload'=>"Photo"
        ];
    }
}
