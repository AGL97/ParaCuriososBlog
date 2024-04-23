<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required | max:40 | min:5',
            'short_description' => 'required | max:100 | min: 5',
            'description'=>'required | min:20',
            'imageRoute' =>'required | min:5',//porque en el nombre tiene que tener como minimo 4 caracteres del formato 
            'category'=>'required | min:4'
        ];
        //TODO: Implementar enum para las categorias
    }
}
