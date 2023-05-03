<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPlaceRequest;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Place;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaceController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('place_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $places = Place::all();

        return view('admin.places.index', compact('places'));
    }

    public function create()
    {
        abort_if(Gate::denies('place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.places.create');
    }

    public function store(StorePlaceRequest $request)
    {
        $place = Place::create($request->all());

        return redirect()->route('admin.places.index');
    }

    public function edit(Place $place)
    {
        abort_if(Gate::denies('place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.places.edit', compact('place'));
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place->update($request->all());

        return redirect()->route('admin.places.index');
    }

    public function show(Place $place)
    {
        abort_if(Gate::denies('place_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $place->load('placesRoutes');

        return view('admin.places.show', compact('place'));
    }

    public function destroy(Place $place)
    {
        abort_if(Gate::denies('place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $place->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlaceRequest $request)
    {
        $places = Place::find(request('ids'));

        foreach ($places as $place) {
            $place->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
