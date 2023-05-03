<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreZoneVehicleCategoryRequest;
use App\Http\Requests\UpdateZoneVehicleCategoryRequest;
use App\Http\Resources\Admin\ZoneVehicleCategoryResource;
use App\Models\ZoneVehicleCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZoneVehicleCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('zone_vehicle_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ZoneVehicleCategoryResource(ZoneVehicleCategory::with(['zone', 'vehicle_category'])->get());
    }

    public function store(StoreZoneVehicleCategoryRequest $request)
    {
        $zoneVehicleCategory = ZoneVehicleCategory::create($request->all());

        return (new ZoneVehicleCategoryResource($zoneVehicleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ZoneVehicleCategory $zoneVehicleCategory)
    {
        abort_if(Gate::denies('zone_vehicle_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ZoneVehicleCategoryResource($zoneVehicleCategory->load(['zone', 'vehicle_category']));
    }

    public function update(UpdateZoneVehicleCategoryRequest $request, ZoneVehicleCategory $zoneVehicleCategory)
    {
        $zoneVehicleCategory->update($request->all());

        return (new ZoneVehicleCategoryResource($zoneVehicleCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ZoneVehicleCategory $zoneVehicleCategory)
    {
        abort_if(Gate::denies('zone_vehicle_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zoneVehicleCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
