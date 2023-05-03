<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Http\Resources\Admin\DriverResource;
use App\Models\Driver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverResource(Driver::with(['routes'])->get());
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

        return (new DriverResource($driver))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverResource($driver->load(['routes']));
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

        return (new DriverResource($driver))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Driver $driver)
    {
        abort_if(Gate::denies('driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
