<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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
            'nome'          => 'required',
            'carga_horaria' => 'required',
            'professor_id'  => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'carga_horaria' => 'Carga horário',
            'professor_id' => 'Professor'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório meu chapa'
        ];
    }
}
