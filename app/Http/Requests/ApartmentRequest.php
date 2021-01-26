<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Casts\Rooms;

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
        return [
            'rooms' => [
                'required',
                function ($attribute, $value, $fail) {
                if (!Rooms::isValid($value)) {
                    $fail('The '.$attribute.' should be 1,2,3,4,5 or >5');
                }
            }],

            'meters' => 'required|numeric',
            'city' => 'required|max:512',
            'address' => 'required|max:512',
            'metro' => 'required|max:512',
            'price' => 'required|integer',
            'about' => 'max:64000'
        ];
    }
}
