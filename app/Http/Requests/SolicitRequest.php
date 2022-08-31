<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitRequest extends FormRequest
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
            'observacao' => 'required|min:3',
            'produtos' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'observacao.required' => 'Observação deve ser preenchido.',
            'produtos.required' => 'Produtos deve ser preenchido.',

            'observacao.min' => 'Mínimo 3 caracteres',
        ];
    }
}
