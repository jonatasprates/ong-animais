<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeterinaryUpdateFormRequest extends FormRequest
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
            'name'      => 'required|min:3|max:100',
            'phone'     => 'max:10',
            'crv'       => 'required|min:3|max:30',
            'address'   => 'required|min:3|max:100',
            'zip_code'  => 'required|min:3|max:100',
            'state'     => 'required|min:3|max:100',
            'city'      => 'required|min:3|max:100',
        ];
    }
}
