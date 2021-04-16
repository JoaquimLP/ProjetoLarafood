<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmpresaRequest extends FormRequest
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
        $id = $this->segment(3);
        $rules = [
            'nome' => "required|min:3|max:150|unique:empresas,nome,{$id},id",
            'cnpj' => "required|unique:empresas,cnpj,{$id},id",
            'email' => 'nullable|email|max:150',
            'image' => 'required|image'
        ];

        if($this->method() == "PUT"){
            $rules = [
                'image' => 'image'
            ];
        }

        return $rules;
    }
}
