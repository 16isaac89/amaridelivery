<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyZoneVehicleCategoryRequest;
use App\Http\Requests\StoreZoneVehicleCategoryRequest;
use App\Http\Requests\UpdateZoneVehicleCategoryRequest;
use App\Models\VehicleCategory;
use App\Models\Zone;
use App\Models\ZoneVehicleCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZoneVehicleCategoryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('zone_vehicle_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zoneVehicleCategories = ZoneVehicleCategory::with(['zone', 'vehicle_category'])->get();

        return view('admin.zoneVehicleCategories.index', compact('zoneVehicleCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('zone_vehicle_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zones = Zone::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_categories = VehicleCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.zoneVehicleCategories.create', compact('vehicle_categories', 'zones'));
    }

    public function store(StoreZoneVehicleCategoryRequest $request)
    {
        $zoneVehicleCategory = ZoneVehicleCategory::create($request->all());

        return redirect()->route('admin.zone-vehicle-categories.index');
    }

    public function edit(ZoneVehicleCategory $zoneVehicleCategory)
    {
        abort_if(Gate::denies('zone_vehicle_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zones = Zone::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_categories = VehicleCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zoneVehicleCategory->load('zone', 'vehicle_category');

        return view('admin.zoneVehicleCategories.edit', compact('vehicle_categories', 'zoneVehicleCategory', 'zones'));
    }

    public function update(UpdateZoneVehicleCategoryRequest $request, ZoneVehicleCategory $zoneVehicleCategory)
    {
        $zoneVehicleCategory->update($request->all());

        return redirect()->route('admin.zone-vehicle-categories.index');
    }

    public function show(ZoneVehicleCategory $zoneVehicleCategory)
    {
        abort_if(Gate::denies('zone_vehicle_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zoneVehicleCategory->load('zone', 'vehicle_category');

        return view('admin.zoneVehicleCategories.show', compact('zoneVehicleCategory'));
    }

    public function destroy(ZoneVehicleCategory $zoneVehicleCategory)
    {
        abort_if(Gate::denies('zone_vehicle_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zoneVehicleCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyZoneVehicleCategoryRequest $request)
    {
        $zoneVehicleCategories = ZoneVehicleCategory::find(request('ids'));

        foreach ($zoneVehicleCategories as $zoneVehicleCategory) {
            $zoneVehicleCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
