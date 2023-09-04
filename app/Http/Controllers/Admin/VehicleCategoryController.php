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
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class VehicleCategoryController extends Controller
{
    use CsvImportTrait,MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleCategories = VehicleCategory::with(['media'])->get();

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
        if ($request->input('pic', false)) {
            $vehicleCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('pic'))))->toMediaCollection('pic');
        }
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
        if ($request->input('pic', false)) {
            if (! $vehicleCategory->pic || $request->input('pic') !== $vehicleCategory->pic->file_name) {
                if ($vehicleCategory->pic) {
                    $vehicleCategory->pic->delete();
                }
                $vehicleCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('pic'))))->toMediaCollection('pic');
            }
        } elseif ($vehicleCategory->pic) {
            $vehicleCategory->pic->delete();
        }
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
