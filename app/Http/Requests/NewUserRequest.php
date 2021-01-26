<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewUserRequest extends FormRequest
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
            'name'                  => 'required|string|max:255',
            'surname'               => 'required|string|max:255',
            'email'                 => 'required|email|unique:users',
            'password'              => ['required',
                                        'min:6',
                                        'regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!_\-$%]).*$/',
                                        'confirmed',
            ],
            'password_confirmation' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->isJson()) {
            $response = response([
                'errors' => $validator->errors(),
            ], 422);
        } else {
            $response = response([
               'errors' => ['Content-Type' => ['Should be json']],
            ], 415);
        }

        throw new HttpResponseException($response);
    }
}
