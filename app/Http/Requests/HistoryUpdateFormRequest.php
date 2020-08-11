<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryUpdateFormRequest extends FormRequest
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
            'date'          => 'required|date|after:tomorrow',
            'animal_id'     => 'required|exists:animals,id',
            'vetenary_id'   => 'required|exists:veterinaries,id',
            'note'          => 'required|min:3|max:1000'  
        ];
    }
}
