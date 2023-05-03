<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySystemSettingRequest;
use App\Http\Requests\StoreSystemSettingRequest;
use App\Http\Requests\UpdateSystemSettingRequest;
use App\Models\SystemSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SystemSettingController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('system_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemSettings = SystemSetting::all();

        return view('admin.systemSettings.index', compact('systemSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('system_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.systemSettings.create');
    }

    public function store(StoreSystemSettingRequest $request)
    {
        $systemSetting = SystemSetting::create($request->all());

        return redirect()->route('admin.system-settings.index');
    }

    public function edit(SystemSetting $systemSetting)
    {
        abort_if(Gate::denies('system_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.systemSettings.edit', compact('systemSetting'));
    }

    public function update(UpdateSystemSettingRequest $request, SystemSetting $systemSetting)
    {
        $systemSetting->update($request->all());

        return redirect()->route('admin.system-settings.index');
    }

    public function show(SystemSetting $systemSetting)
    {
        abort_if(Gate::denies('system_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.systemSettings.show', compact('systemSetting'));
    }

    public function destroy(SystemSetting $systemSetting)
    {
        abort_if(Gate::denies('system_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroySystemSettingRequest $request)
    {
        $systemSettings = SystemSetting::find(request('ids'));

        foreach ($systemSettings as $systemSetting) {
            $systemSetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
