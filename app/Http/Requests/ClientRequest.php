<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClientRequest extends FormRequest
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
            'name'         => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'lastname1'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'lastname1'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'email'        => 'email|required|max:100',
            'phone'        => 'max:15',
            'birthday'     => 'date|required|before:today',
            'document'     => 'digits_between:6,15|required|max:15',            
            'address'      => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:500',            
            'local'        => 'required',            
            'sex'          => 'required',            
            
        ];
    }
}
