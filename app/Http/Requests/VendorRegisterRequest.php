<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRegisterRequest extends FormRequest
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
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'district' => [
                'string',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'password' => [
                'required',
            ],

        ];
    }
}
