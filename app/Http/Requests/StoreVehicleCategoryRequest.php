<?php

namespace App\Http\Requests;

use App\Models\VehicleCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_category_create');
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
