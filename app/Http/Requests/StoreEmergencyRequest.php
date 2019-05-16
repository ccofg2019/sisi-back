<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmergencyRequest extends FormRequest
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
            //
            'latitude'  => 'required|numeric|between:-99.99999999, 99.99999999',
            'longitude' => 'required|numeric|between:-999.99999999, 999.99999999'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute é de preenchimento obrigatório!',
            'numeric'  => 'O valor do campo :attribute deve ser do tipo numerico!',
            'between'  => 'O valor do campo :attribute deve estar entre :min e :max!'
        ];
    }
}
