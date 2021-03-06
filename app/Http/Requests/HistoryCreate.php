<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryCreate extends FormRequest
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
            'title'=>"required|min:3",
            'date'=>"required",
            'icon'=>'required|mimes:png'
        ];
    }

    public function attributes(){
        return [
            'title'=>"Title",
            'date'=>"Date",
            'icon'=>'Title Photo'
        ];
    }
}
