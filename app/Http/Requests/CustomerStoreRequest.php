<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required||unique:customers',
            'phoneNumber' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'surname.required' => 'A surname is required',
            'email.required' => 'A email is required',
            'email.unique' => 'A email could be unique',
            'phoneNumber.required' => 'A phoneNumber is required',
        ];
    }
}