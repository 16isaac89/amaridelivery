<?php

namespace App\Http\Requests;

use App\Models\SystemSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSystemSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('system_setting_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'value' => [
                'string',
                'required',
            ],
        ];
    }
}
