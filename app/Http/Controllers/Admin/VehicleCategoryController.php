<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyVehicleCategoryRequest;
use App\Http\Requests\StoreVehicleCategoryRequest;
use App\Http\Requests\UpdateVehicleCategoryRequest;
use App\Models\VehicleCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleCategoryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleCategories = VehicleCategory::all();

        return view('admin.vehicleCategories.index', compact('vehicleCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicleCategories.create');
    }

    public function store(StoreVehicleCategoryRequest $request)
    {
        $vehicleCategory = VehicleCategory::create($request->all());

        return redirect()->route('admin.vehicle-categories.index');
    }

    public function edit(VehicleCategory $vehicleCategory)
    {
        abort_if(Gate::denies('vehicle_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicleCategories.edit', compact('vehicleCategory'));
    }

    public function update(UpdateVehicleCategoryRequest $request, VehicleCategory $vehicleCategory)
    {
        $vehicleCategory->update($request->all());

        return redirect()->route('admin.vehicle-categories.index');
    }

    public function show(VehicleCategory $vehicleCategory)
    {
        abort_if(Gate::denies('vehicle_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleCategory->load('vehicleCategoryZoneVehicleCategories');

        return view('admin.vehicleCategories.show', compact('vehicleCategory'));
    }

    public function destroy(VehicleCategory $vehicleCategory)
    {
        abort_if(Gate::denies('vehicle_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleCategoryRequest $request)
    {
        $vehicleCategories = VehicleCategory::find(request('ids'));

        foreach ($vehicleCategories as $vehicleCategory) {
            $vehicleCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
