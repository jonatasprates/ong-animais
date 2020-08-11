<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalUpdateFormRequest extends FormRequest
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
            'name'      => 'required',
            'image'     => 'image|mimes:jpg,png,jpeg',
            'age'       => 'required|numeric',
            'specie'    => 'required',
            'blood'     => 'required',
            'note'      => 'min:3|max:1000',
        ];
    }
}
