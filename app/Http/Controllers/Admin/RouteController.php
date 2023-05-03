<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRouteRequest;
use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Models\Place;
use App\Models\Route;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('route_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routes = Route::with(['places'])->get();

        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        abort_if(Gate::denies('route_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $places = Place::pluck('name', 'id');

        return view('admin.routes.create', compact('places'));
    }

    public function store(StoreRouteRequest $request)
    {
        $route = Route::create($request->all());
        $route->places()->sync($request->input('places', []));

        return redirect()->route('admin.routes.index');
    }

    public function edit(Route $route)
    {
        abort_if(Gate::denies('route_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $places = Place::pluck('name', 'id');

        $route->load('places');

        return view('admin.routes.edit', compact('places', 'route'));
    }

    public function update(UpdateRouteRequest $request, Route $route)
    {
        $route->update($request->all());
        $route->places()->sync($request->input('places', []));

        return redirect()->route('admin.routes.index');
    }

    public function show(Route $route)
    {
        abort_if(Gate::denies('route_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $route->load('places', 'routeOrders', 'routesDrivers');

        return view('admin.routes.show', compact('route'));
    }

    public function destroy(Route $route)
    {
        abort_if(Gate::denies('route_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $route->delete();

        return back();
    }

    public function massDestroy(MassDestroyRouteRequest $request)
    {
        $routes = Route::find(request('ids'));

        foreach ($routes as $route) {
            $route->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
