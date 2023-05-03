<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFleetRequest;
use App\Http\Requests\StoreFleetRequest;
use App\Http\Requests\UpdateFleetRequest;
use App\Models\Fleet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FleetController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('fleet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fleets = Fleet::with(['media'])->get();

        return view('admin.fleets.index', compact('fleets'));
    }

    public function create()
    {
        abort_if(Gate::denies('fleet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fleets.create');
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fleet->id]);
        }

        return redirect()->route('admin.fleets.index');
    }

    public function edit(Fleet $fleet)
    {
        abort_if(Gate::denies('fleet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fleets.edit', compact('fleet'));
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

        return redirect()->route('admin.fleets.index');
    }

    public function show(Fleet $fleet)
    {
        abort_if(Gate::denies('fleet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fleets.show', compact('fleet'));
    }

    public function destroy(Fleet $fleet)
    {
        abort_if(Gate::denies('fleet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fleet->delete();

        return back();
    }

    public function massDestroy(MassDestroyFleetRequest $request)
    {
        $fleets = Fleet::find(request('ids'));

        foreach ($fleets as $fleet) {
            $fleet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fleet_create') && Gate::denies('fleet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Fleet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
