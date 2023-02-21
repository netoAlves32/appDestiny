<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:4'], //Reglas de validación
            'body' => ['required', 'min:10']
                                             //Colocar todos os campos que no tengan reglas acá con un array vacio
        ];
            //'title.required' => 'Aquí escribimos un error personalizado' :attribute'
    }
}
