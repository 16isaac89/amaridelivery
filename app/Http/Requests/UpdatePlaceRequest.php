<?php

namespace App\Http\Requests;

use App\Models\Place;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlaceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('place_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
