<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
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
                'unique:customers,email,' . request()->route('customer')->id,
            ],
            'phone_1' => [
                'string',
                'required',
                'unique:customers,phone_1,' . request()->route('customer')->id,
            ],
            'phone_2' => [
                'string',
                'min:6',
                'nullable',
            ],
        ];
    }
}
