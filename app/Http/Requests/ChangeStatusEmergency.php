<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusEmergency extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
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
            'emergency_id' => 'required|integer',
            'status'       => 'required|in:ALERTA,PERIGO,FINALIZADO' 
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é de preenchimento obrigatório!',
            'integer'  => 'O campo :attribute precisa ser do tipo inteiro!',
            'in'   => 'O campo :attribute só pode aceitar os valores: ALERTA, PERIGO e FINALIZADO'
        ];
    }
}
