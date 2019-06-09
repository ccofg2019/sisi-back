<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRRecoveryRequest extends FormRequest
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
            'key'         => 'required|max:250',
            'newPassword' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é de preenchimento obrigatório!',
            'max'      => 'O campo :attribute deve ter no maximo :max caracteres!'
        ];
    }
}