<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Str;
use Illuminate\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'name' => [
                "required",
                "string",
                "max:255"
            ],
            'email' => [
                "required",
                "string",
                "lowercase",
                "email",
                "max:255",
                "unique:users"
            ],
            'password' => [
                "required",
                "confirmed",
                Password::default() // équivaut à Password::min(8)
            ],
        ];
    }
    /*
    * function qui s'exécute après la validation des données
    return array 
    */

    // public function after(): array {
    //     return [
    //         function (Validator $validator){
    //             // si la validation n'échoue pas 
    //                 if(!$validator->fails()){
    //                     // encrypter le mot de passe courant
    //                     $this->merge([
    //                         'password' => bcrypt($this->password)
    //                     ]);
    //                 }
    //         }
    //     ];
    // }
    // protected function passedValidation()
    // {
    //     $this->merge([
    //         "password",
    //         bcrypt($this->password),
    //         // "slug" => Str::slug($this->name)
    //     ]);

    // }
}
