<?php

namespace App\Http\Requests;

use App\Models\Addre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('addre_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'required',
            ],
        ];
    }
}
