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
            'quantidade' => 'required',
            'product_id' => 'required',
            'status' => 'required',
            'unit_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'observacao.required' => 'Observação deve ser preenchido.',
            'quantidade.required' => 'Quantidade deve ser preenchido.',
            'product_id.required' => 'Produto deve ser preenchido.',
            'unit_id.required' => 'Unidade deve ser preenchido.',
            'status.required' => 'Status deve ser preenchido',

            'observacao.min' => 'Mínimo 3 caracteres',
        ];
    }
}
