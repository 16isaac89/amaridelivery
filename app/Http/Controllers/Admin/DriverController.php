<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDriverRequest;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;
use App\Models\Route;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DriverController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::with(['routes', 'media'])->get();

        return view('admin.drivers.index', compact('drivers'));
    }

    public function create()
    {
        abort_if(Gate::denies('driver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routes = Route::pluck('name', 'id');

        return view('admin.drivers.create', compact('routes'));
    }

    public function store(StoreDriverRequest $request)
    {
        $driver = Driver::create($request->all());
        $driver->routes()->sync($request->input('routes', []));
        if ($request->input('photo', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('idphoto', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('idphoto'))))->toMediaCollection('idphoto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $driver->id]);
        }

        return redirect()->route('admin.drivers.index');
    }

    public function edit(Driver $driver)
    {
        abort_if(Gate::denies('driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routes = Route::pluck('name', 'id');

        $driver->load('routes');

        return view('admin.drivers.edit', compact('driver', 'routes'));
    }

    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->update($request->all());
        $driver->routes()->sync($request->input('routes', []));
        if ($request->input('photo', false)) {
            if (! $driver->photo || $request->input('photo') !== $driver->photo->file_name) {
                if ($driver->photo) {
                    $driver->photo->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($driver->photo) {
            $driver->photo->delete();
        }

        if ($request->input('idphoto', false)) {
            if (! $driver->idphoto || $request->input('idphoto') !== $driver->idphoto->file_name) {
                if ($driver->idphoto) {
                    $driver->idphoto->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('idphoto'))))->toMediaCollection('idphoto');
            }
        } elseif ($driver->idphoto) {
            $driver->idphoto->delete();
        }

        return redirect()->route('admin.drivers.index');
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->load('routes', 'driverOrders');

        return view('admin.drivers.show', compact('driver'));
    }

    public function destroy(Driver $driver)
    {
        abort_if(Gate::denies('driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->delete();

        return back();
    }

    public function massDestroy(MassDestroyDriverRequest $request)
    {
        $drivers = Driver::find(request('ids'));

        foreach ($drivers as $driver) {
            $driver->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('driver_create') && Gate::denies('driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Driver();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
