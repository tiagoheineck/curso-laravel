<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConteudoRequest extends FormRequest
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
            'titulo'   => 'required',
            'conteudo' => 'required',
            'disciplina_id'  => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'conteudo' => 'Conteudo',
            'disciplina_id' => 'Disciplina'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O nome é obrigatório meu chapa'
        ];
    }
}
