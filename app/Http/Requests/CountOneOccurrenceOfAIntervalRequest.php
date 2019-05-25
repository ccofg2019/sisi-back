<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountOneOccurrenceOfAIntervalRequest extends FormRequest
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
            'occurrence_id' => 'required|numeric',
            'date_start'      => 'required|date_format:Y-m-d',
            'date_end'        => 'required|date_format:Y-m-d'
        ];
    }
    public function messages()
    {
        return [
            'number'          => 'O campo :attribute deve ser to tipo inteiro!',
            'required'        => 'O campo :attribute é de preenchimento obrigatório!',
            'date_format'     => 'O campo :attribute deve estar no padrão YYYY-MM-DD!'
        ];
    }
}
