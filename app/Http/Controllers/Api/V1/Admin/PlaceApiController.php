<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Resources\Admin\PlaceResource;
use App\Models\Place;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('place_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlaceResource(Place::all());
    }

    public function store(StorePlaceRequest $request)
    {
        $place = Place::create($request->all());

        return (new PlaceResource($place))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Place $place)
    {
        abort_if(Gate::denies('place_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlaceResource($place);
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place->update($request->all());

        return (new PlaceResource($place))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Place $place)
    {
        abort_if(Gate::denies('place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $place->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
