<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRecoveryStoreRequest extends FormRequest
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
            'email'     => 'required',
            'cpf'       => 'required',
            'birthdate' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é de preenchimento obrigatorio!',
            'date_format'     => 'O campo :attribute deve estar no padrão YYYY-MM-DD!'
        ];
    }
}