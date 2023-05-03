<?php

namespace App\Http\Requests;

use App\Models\Route;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRouteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('route_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'places.*' => [
                'integer',
            ],
            'places' => [
                'required',
                'array',
            ],
        ];
    }
}
