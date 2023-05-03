<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_create');
    }

    public function rules()
    {
        return [
            'fullname' => [
                'string',
                'required',
            ],
            'phone_1' => [
                'string',
                'required',
                'unique:drivers',
            ],
            'photo' => [
                'required',
            ],
            'password' => [
                'string',
                'min:6',
                'required',
            ],
            'phone_2' => [
                'string',
                'nullable',
            ],
            'routes.*' => [
                'integer',
            ],
            'routes' => [
                'array',
            ],
        ];
    }
}
