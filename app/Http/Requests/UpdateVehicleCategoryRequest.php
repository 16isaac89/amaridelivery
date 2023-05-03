<?php

namespace App\Http\Requests;

use App\Models\VehicleCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_category_edit');
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
