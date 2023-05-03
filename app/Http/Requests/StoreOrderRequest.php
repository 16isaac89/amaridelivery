<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'size' => [
                'string',
                'required',
            ],
            'vehicle' => [
                'string',
                'required',
            ],
            'from' => [
                'string',
                'required',
            ],
            'to' => [
                'string',
                'required',
            ],
            'money' => [
                'string',
                'nullable',
            ],
            'datetime' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
