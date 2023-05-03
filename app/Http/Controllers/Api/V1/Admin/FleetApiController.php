<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFleetRequest;
use App\Http\Requests\UpdateFleetRequest;
use App\Http\Resources\Admin\FleetResource;
use App\Models\Fleet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FleetApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fleet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FleetResource(Fleet::all());
    }

    public function store(StoreFleetRequest $request)
    {
        $fleet = Fleet::create($request->all());

        if ($request->input('pic', false)) {
            $fleet->addMedia(storage_path('tmp/uploads/' . basename($request->input('pic'))))->toMediaCollection('pic');
        }

        foreach ($request->input('otherpapapers', []) as $file) {
            $fleet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('otherpapapers');
        }

        return (new FleetResource($fleet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Fleet $fleet)
    {
        abort_if(Gate::denies('fleet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FleetResource($fleet);
    }

    public function update(UpdateFleetRequest $request, Fleet $fleet)
    {
        $fleet->update($request->all());

        if ($request->input('pic', false)) {
            if (! $fleet->pic || $request->input('pic') !== $fleet->pic->file_name) {
                if ($fleet->pic) {
                    $fleet->pic->delete();
                }
                $fleet->addMedia(storage_path('tmp/uploads/' . basename($request->input('pic'))))->toMediaCollection('pic');
            }
        } elseif ($fleet->pic) {
            $fleet->pic->delete();
        }

        if (count($fleet->otherpapapers) > 0) {
            foreach ($fleet->otherpapapers as $media) {
                if (! in_array($media->file_name, $request->input('otherpapapers', []))) {
                    $media->delete();
                }
            }
        }
        $media = $fleet->otherpapapers->pluck('file_name')->toArray();
        foreach ($request->input('otherpapapers', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $fleet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('otherpapapers');
            }
        }

        return (new FleetResource($fleet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Fleet $fleet)
    {
        abort_if(Gate::denies('fleet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fleet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
