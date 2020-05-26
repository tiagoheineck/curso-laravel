<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoProfessorRequest extends FormRequest
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
            'departamento_id'   => 'required',
            'professor_id'      => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'departamento_id'   => 'Departamento',
            'professor_id'      => 'Professor'
        ];
    }

    public function messages()
    {
        return [
            'departamento_id.required'   => 'Preencha corretamente o formulário',
            'professor_id.required'      => 'Preencha corretamente o formulário'
        ];
    }
}
