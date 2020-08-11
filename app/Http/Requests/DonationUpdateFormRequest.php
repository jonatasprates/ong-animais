<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class DonationUpdateFormRequest extends FormRequest
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
      $id = Request::segment(2);
        
        return [
            'name'  => 'required|min:3|max:100',
            'rg'    => 'max:9',
            'email' => "required|min:3|max:100|unique:donations,email,{$id},id",
            'fone' => 'max:10',
            'cell_phone' => 'max:12',
            'address' => 'required|min:3|max:100',
            'zip_code' => 'required|unique:donations,email,{$id},id',
            'state' => 'required|min:3|max:100',
            'city' => 'required|min:3|max:100',
            'type' => 'required|min:3|max:100',
            'qty' => 'required',
        ];
    }
}
