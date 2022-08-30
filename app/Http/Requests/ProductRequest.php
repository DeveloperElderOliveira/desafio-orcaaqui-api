<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'descricao' => 'required|min:3',
            'preco' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Descrição deve ser preenchido.',
            'preco.required' => 'Preço deve ser preenchido.',
            'category_id.required' => 'Categoria deve ser preenchida.',

            'descricao.min' => 'Mínimo 3 caracteres',
        ];
    }
}
