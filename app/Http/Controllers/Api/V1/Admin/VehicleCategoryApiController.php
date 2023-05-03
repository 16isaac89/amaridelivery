<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleCategoryRequest;
use App\Http\Requests\UpdateVehicleCategoryRequest;
use App\Http\Resources\Admin\VehicleCategoryResource;
use App\Models\VehicleCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicle_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleCategoryResource(VehicleCategory::all());
    }

    public function store(StoreVehicleCategoryRequest $request)
    {
        $vehicleCategory = VehicleCategory::create($request->all());

        return (new VehicleCategoryResource($vehicleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VehicleCategory $vehicleCategory)
    {
        abort_if(Gate::denies('vehicle_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleCategoryResource($vehicleCategory);
    }

    public function update(UpdateVehicleCategoryRequest $request, VehicleCategory $vehicleCategory)
    {
        $vehicleCategory->update($request->all());

        return (new VehicleCategoryResource($vehicleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VehicleCategory $vehicleCategory)
    {
        abort_if(Gate::denies('vehicle_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
