<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
        return[
            'nome'  => 'required',
            'cidade_id'  => 'required',
            'departamento_id'  => 'required'

        ];
    }

    public function attributes() //para as mensagens de erro/sucesso virem customizadas e não com o nome da coluna
    {
        return [
            'cidade_id'=>'Cidade',
            'departamento_id'=>'Departamento'
        ];
    } 

    public function messages()
    {
        return[
            'nome.required'=>'O nome é obrigatório',
            'cidade_id.required'=>'Escolha uma cidade',
            'departamento_id.required'=>'Escolha um departamento'
        ];
    }
}
