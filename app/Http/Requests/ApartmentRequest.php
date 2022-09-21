<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'corner'             => ['required'],
            'near_the_road'      => ['nullable'],
            'outstanding_teacher'=> ['nullable'],
            'schools'            => ['nullable'],
            'markets'            => ['nullable'],
            'other_services'     => ['nullable'],
            'category_id'        => ['required','numeric'],
            'number_rooms'       => ['required','numeric'],
            'floor_rooms'        => ['required','numeric'],
            'area_metres'        => ['required','numeric'],
            'number_bathrooms'   => ['required','numeric'],
            'generator'          => ['nullable'],
            'balcony'            => ['nullable'],
            'passenger_kitchen'  => ['nullable'],
            'elevator'           => ['nullable'],
            'video'              => ['nullable','file'],
            'city_id'            => ['required','numeric'],
            'region_id'          => ['nullable','numeric'],
            'number_rental_days' => ['required','numeric'],
            'price_range'        => ['required','numeric'],
            'full_name'          => ['required','min:2','max:255'],
            'first_phone'        => ['required','numeric'],
            'second_phone'       => ['required','numeric'],
            // 'owner_id'           => ['required','numeric'],
            'contract_terms'     => ['nullable','string'],
            'owner_phone'        => ['required','numeric'],
            'owner_name'         => ['required','string'],
            'region_name'        => ['required','string'],
            'ownership'          => ['nullable','string','min:2','max:255'],
        ];

        if (in_array($this->method(), ['post', 'POST'])) {
        
            $rules['national_card'] = ['required','file'];
            // $rules['ownership']     = ['required','file'];

        }

        return $rules;

    }//end of rul

    protected function prepareForValidation()
    {
        $this->merge([
            'corner'              => request()->has('corner') ?? '0',
            'near_the_road'       => request()->has('near_the_road') ?? '0',
            'outstanding_teacher' => request()->has('outstanding_teacher') ?? '0',
            'schools'             => request()->has('schools') ?? '0',
            'markets'             => request()->has('markets') ?? '0',
            'other_services'      => request()->has('other_services') ?? '0',
            'generator'           => request()->has('generator') ?? '0',
            'balcony'             => request()->has('balcony') ?? '0',
            'passenger_kitchen'   => request()->has('passenger_kitchen') ?? '0',
            'elevator'            => request()->has('elevator') ?? '0',
        ]);

    }//end of funw

}//end of vlass
