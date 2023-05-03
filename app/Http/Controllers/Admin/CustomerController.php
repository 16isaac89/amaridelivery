<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::with(['partner', 'media'])->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customers.create', compact('partners'));
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        if ($request->input('profilepic', false)) {
            $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilepic'))))->toMediaCollection('profilepic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $customer->id]);
        }

        return redirect()->route('admin.customers.index');
    }

    public function edit(Customer $customer)
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer->load('partner');

        return view('admin.customers.edit', compact('customer', 'partners'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        if ($request->input('profilepic', false)) {
            if (! $customer->profilepic || $request->input('profilepic') !== $customer->profilepic->file_name) {
                if ($customer->profilepic) {
                    $customer->profilepic->delete();
                }
                $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('profilepic'))))->toMediaCollection('profilepic');
            }
        } elseif ($customer->profilepic) {
            $customer->profilepic->delete();
        }

        return redirect()->route('admin.customers.index');
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->load('partner');

        return view('admin.customers.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerRequest $request)
    {
        $customers = Customer::find(request('ids'));

        foreach ($customers as $customer) {
            $customer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('customer_create') && Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Customer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
