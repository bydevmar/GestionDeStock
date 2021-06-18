<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientRequest extends FormRequest
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
        return [
            'nomclient' => 'required|min:4|max:200',
            'prenomclient' => 'required|min:4|max:200',
            'telephoneclient' => 'required|min:4|max:300',
            'adresseclient' => 'required|min:4|max:300',
            'emailclient' => 'email:rfc,dns',
            'password' => 'required|min:8|max:100',
            'confirmpassword' => 'required|min:8|max:100|same:password'
        ];
    }
}
