<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
        $rules = [
            'name'        => ['required','min:2','max:255'],
            'first_phone' => ['required','numeric'],
            'last_phone'  => ['required','numeric'],
        ];

        if (in_array($this->method(), ['post', 'POST'])) {
        
            $rules['image'] = ['required','image'];

        }

        return $rules;

    }//end of rule

}//end of class
