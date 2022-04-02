<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'contact_name' => [
                'required'
            ],
            'contact_email' => [
                'required',
                'unique:clients,contact_email'
            ],
            'contact_phone_number' => [
                'required',
                'string'
            ],
            'company_name' => [
                'sometimes',
                'nullable',
                'string'
            ],
            'company_address' => [
                'sometimes',
                'nullable',
                'string'
            ],
            'company_phone_number' => [
                'sometimes',
                'nullable',
                'string'
            ]
        ];
    }
}
