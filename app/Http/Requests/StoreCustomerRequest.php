<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
    }

    public function rules()
    {
        return [
            'firstname' => [
                'string',
                'required',
            ],
            'secondname' => [
                'string',
                'required',
            ],
            'thirdname' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:customers',
            ],
            'phone_1' => [
                'string',
                'required',
                'unique:customers',
            ],
            'phone_2' => [
                'string',
                'min:6',
                'nullable',
            ],
        ];
    }
}
