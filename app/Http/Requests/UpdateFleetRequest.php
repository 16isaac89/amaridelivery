<?php

namespace App\Http\Requests;

use App\Models\Fleet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFleetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fleet_edit');
    }

    public function rules()
    {
        return [
            'manufacturer' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'pic' => [
                'required',
            ],
            'number' => [
                'string',
                'required',
            ],
            'otherpapapers' => [
                'array',
            ],
        ];
    }
}
