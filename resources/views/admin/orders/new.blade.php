@extends('layouts.admin')
@section('styles')
<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  border: none;
  &:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
  }
  a {
    color: initial;
    &:hover {
      text-decoration: initial;
    }
  }
  .text-muted i {
    margin: 0 10px;
  }
}

    </style>
@endsection
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Order', 'route' => 'admin.orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="container">
            <div class="text-center">
              <h1>New Orders</h1>
            </div>
            <div class="container">
              <div class="card-columns">
                @foreach ($orders as $order)
                <div class="card">
                  <a href="{{route('admin.assignorder.view',$order->id)}}">
                  <div class="card-body">
                    <p>Ordered {{$order->created_at->diffInMinutes(\Carbon\Carbon::now())}} Minutes Ago</p>
                    <h5 class="card-title">From: {{$order->from}}</h5>
                    <h5 class="card-title">To: {{$order->to}}.</h5>
                    <h5 class="card-title">Details: {{$order->details}}.</h5>
                    <h5 class="card-title">Fare: {{$order->money}}.</h5>
                  </div>
                  </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
</script>
@endsection