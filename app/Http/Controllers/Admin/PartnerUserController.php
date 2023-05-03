<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPartnerUserRequest;
use App\Http\Requests\StorePartnerUserRequest;
use App\Http\Requests\UpdatePartnerUserRequest;
use App\Models\PartnerUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerUserController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('partner_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerUsers = PartnerUser::all();

        return view('admin.partnerUsers.index', compact('partnerUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('partner_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerUsers.create');
    }

    public function store(StorePartnerUserRequest $request)
    {
        $partnerUser = PartnerUser::create($request->all());

        return redirect()->route('admin.partner-users.index');
    }

    public function edit(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerUsers.edit', compact('partnerUser'));
    }

    public function update(UpdatePartnerUserRequest $request, PartnerUser $partnerUser)
    {
        $partnerUser->update($request->all());

        return redirect()->route('admin.partner-users.index');
    }

    public function show(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerUsers.show', compact('partnerUser'));
    }

    public function destroy(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerUserRequest $request)
    {
        $partnerUsers = PartnerUser::find(request('ids'));

        foreach ($partnerUsers as $partnerUser) {
            $partnerUser->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
