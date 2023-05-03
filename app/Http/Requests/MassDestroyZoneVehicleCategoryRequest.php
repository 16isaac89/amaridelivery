<?php

namespace App\Http\Requests;

use App\Models\ZoneVehicleCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyZoneVehicleCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('zone_vehicle_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:zone_vehicle_categories,id',
        ];
    }
}
