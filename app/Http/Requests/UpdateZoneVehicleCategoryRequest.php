<?php

namespace App\Http\Requests;

use App\Models\ZoneVehicleCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateZoneVehicleCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zone_vehicle_category_edit');
    }

    public function rules()
    {
        return [
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
