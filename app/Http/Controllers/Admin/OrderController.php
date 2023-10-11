<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Route;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\helpers\PushNotification;

class OrderController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['driver', 'route'])->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('phone_1', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routes = Route::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('drivers', 'routes'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('phone_1', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routes = Route::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('driver', 'route');

        return view('admin.orders.edit', compact('drivers', 'order', 'routes'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('driver', 'route');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        $orders = Order::find(request('ids'));

        foreach ($orders as $order) {
            $order->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function neworders(){
        $orders = Order::where('status','pending')->get();
        //dd($orders);
        return view('admin.orders.new', compact('orders'));
    }
    public function neworderassignview(Order $order){
        $order->load('driver', 'route');
        $drivers = Driver::pluck('phone_1', 'id','fullname')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.orders.assign', compact('drivers','order'));
    }
    public function neworderassign(Order $order){
        $order->load('partner');
        $order->update([
'driver_id'=>request()->driver_id,
        ]);
        $orders = Order::where('status','pending')->get();
        $partner = $order->partner;
        //dd($partner);
        $title = 'New order assignment';
        $message = 'You have been assigned a new order please open the app to accept the order.';
        $type = 1;
        $fcm = Driver::find(request()->driver_id)->fcm;
        (new PushNotification)->sendneworder($title,$fcm,$message,$type);

        $title2 = 'Order assignment';
        $message2 = 'Your order has been assigned to an agent.';
        $type2 = 1;
        $fcm2 = $partner->fcm;
        (new PushNotification)->sendneworder($title2,$fcm2,$message2,$type2);
        //dd('done');
        return view('admin.orders.new', compact('orders'));
    }
}
