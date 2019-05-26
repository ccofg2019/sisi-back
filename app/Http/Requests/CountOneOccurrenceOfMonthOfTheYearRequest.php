<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountOneOccurrenceOfMonthOfTheYearRequest extends FormRequest
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
            'month'        => 'required|numeric',
            'year'      => 'required|numeric'            
        ];
    }
    public function messages()
    {
        return [
            'number'          => 'O campo :attribute deve ser to tipo inteiro!',
            'required'        => 'O campo :attribute é de preenchimento obrigatório!'
        ];
    }
}
