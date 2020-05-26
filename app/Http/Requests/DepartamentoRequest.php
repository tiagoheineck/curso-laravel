<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
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
            'chefe_id'  => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'chefe_id' => 'Chefe'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório meu chapa'
        ];
    }
}
