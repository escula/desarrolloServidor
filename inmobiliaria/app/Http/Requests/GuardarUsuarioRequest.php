<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarUsuarioRequest extends FormRequest
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
            "id_usuario" => "required|unique:usuarios,id_usuario|max:8",
            "password" => "required|max:255"
            
        ];
    }





    //--------------//cosas que no se si funcionan------------
    // public function withValidator($validator){

    //     $validator->after(function ($validator){
    //         $validationMessages= $validator->errors()->getMessages();
    //         $uniqueMessages = array_unique($validationMessages, SORT_REGULAR);

    //     });
    // }

    // Si quieres personalozar los mensjes de errores
    // public function messages(): array {
    //     return [
    //         'id_usuario.required'=> 'Se quiere especificar el id_usuario',
    //         'password.requiered' => 'Esto es el menaje del bdy'
    //     ];
    // }

}
