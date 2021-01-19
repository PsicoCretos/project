<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest //entre o envio dos dados e meu metodo
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() //teste pra ver se o usuario e permitido, true para passar e nao cair
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
            'name'              => 'required|max:45',
            'description'       => 'required|min:10',
            'phone'             => 'required|max:10',
            'mobile_phone'      => 'required|max:11',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este Campo É Obrigatório',
            'min' => 'Campo Deve Ter No Mínimo :min Caracteres'
            
        ];
    }
}
