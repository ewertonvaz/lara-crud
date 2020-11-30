<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoFormRequest extends FormRequest
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
        //dd($this->request);
        if ($this->request->has("cancel")){ return [];}
        return [
            //'title' => 'required|unique:posts|max:255',
            'tipo' => 'required',
            'modelo' => 'required|max:15',
            'fabricante' => 'required',
        ];
    }

    public function messages(){
    	return [
           'tipo.required' => 'O TIPO do Equipamento deve ser preenchido',
            'modelo.required' => 'O MODELO do Equipamento deve ser preenchido',
            'modelo.max' => 'O campo MODELO pode conter no máximo 15 caracteres',
            'fabricante.required' => 'O FABRICANTE do Equipamento deve ser preenchido',
    	//'nome.unique' => 'J&aacute; existe uma categoria com este Nome',
    	//'required' => 'O :attribute deve ser preenchido'
    	];
    }

    public function attributes(){
    	return [
    		'tipo' => 'Tipo do Equipamento'
    	];
    }
}
