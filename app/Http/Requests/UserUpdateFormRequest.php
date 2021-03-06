<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateFormRequest extends FormRequest
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
        $id = auth()->user()->id;
        
        return [
            'name'          => 'required|min:3|max:100',
            'email'         => "required|min:3|max:100|email|unique:users,email,{$id},id",
            'password'      => 'max:15|confirmed',
        ];
    }
}
