<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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
            'titulo' => "required|min:3|max:150|unique:produtos,titulo,{$id},id",
            'preco' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'descricao' => 'nullable|min:3|max:150',
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
