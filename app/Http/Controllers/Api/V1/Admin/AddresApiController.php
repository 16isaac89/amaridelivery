<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddreRequest;
use App\Http\Requests\UpdateAddreRequest;
use App\Http\Resources\Admin\AddreResource;
use App\Models\Addre;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddresApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddreResource(Addre::all());
    }

    public function store(StoreAddreRequest $request)
    {
        $addre = Addre::create($request->all());

        return (new AddreResource($addre))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Addre $addre)
    {
        abort_if(Gate::denies('addre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddreResource($addre);
    }

    public function update(UpdateAddreRequest $request, Addre $addre)
    {
        $addre->update($request->all());

        return (new AddreResource($addre))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Addre $addre)
    {
        abort_if(Gate::denies('addre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addre->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
