<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddreRequest;
use App\Http\Requests\StoreAddreRequest;
use App\Http\Requests\UpdateAddreRequest;
use App\Models\Addre;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddresController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('addre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addres = Addre::all();

        return view('admin.addres.index', compact('addres'));
    }

    public function create()
    {
        abort_if(Gate::denies('addre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addres.create');
    }

    public function store(StoreAddreRequest $request)
    {
        $addre = Addre::create($request->all());

        return redirect()->route('admin.addres.index');
    }

    public function edit(Addre $addre)
    {
        abort_if(Gate::denies('addre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addres.edit', compact('addre'));
    }

    public function update(UpdateAddreRequest $request, Addre $addre)
    {
        $addre->update($request->all());

        return redirect()->route('admin.addres.index');
    }

    public function show(Addre $addre)
    {
        abort_if(Gate::denies('addre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addres.show', compact('addre'));
    }

    public function destroy(Addre $addre)
    {
        abort_if(Gate::denies('addre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addre->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddreRequest $request)
    {
        $addres = Addre::find(request('ids'));

        foreach ($addres as $addre) {
            $addre->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
