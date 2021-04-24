<?php

namespace App\Http\Requests;

use App\Rules\UniqueEmpresa;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoriaRequest extends FormRequest
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
        return [
            //'nome' => "required|min:3|max:150|unique:categorias,nome,{$id},id",
            'nome' => [
                "required",
                "min:3",
                "max:150",
                new UniqueEmpresa('categorias', $id, 'id'),
            ],
            'descricao' => "required|min:3|max:150",
        ];
    }
}
