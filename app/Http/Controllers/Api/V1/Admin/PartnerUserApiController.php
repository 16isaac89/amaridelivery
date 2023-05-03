<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerUserRequest;
use App\Http\Requests\UpdatePartnerUserRequest;
use App\Http\Resources\Admin\PartnerUserResource;
use App\Models\PartnerUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerUserApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partner_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartnerUserResource(PartnerUser::all());
    }

    public function store(StorePartnerUserRequest $request)
    {
        $partnerUser = PartnerUser::create($request->all());

        return (new PartnerUserResource($partnerUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartnerUserResource($partnerUser);
    }

    public function update(UpdatePartnerUserRequest $request, PartnerUser $partnerUser)
    {
        $partnerUser->update($request->all());

        return (new PartnerUserResource($partnerUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
