<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetorFormRequest extends FormRequest
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
        if ($this->request->has("cancel")){ return [];}
        return [
            'sigla' => 'required',
            'descricao' => 'max:150',
            'secao' => 'required'
        ];
    }
    public function messages(){
    	return [
           'sigla.required' => 'A SIGLA do setor deve ser informada',
           'descricao.max' => 'O campo DESCRICAO pode conter no máximo 150 caracteres',
           'secao.required' => 'A SEÇÃO do setor deve ser preenchida'
    	];
    }
}
