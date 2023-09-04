<?php

namespace App\Http\Controllers\helpers;
use App\Models\Order;

class PaymentGateWay{

    public function flutterlink($txn,$amount,$description,$customer){
        $flutterapi =  env('FLW_SECRET_KEY');
        $flutterurl = env('FLW_URL');
        $request = [
        'tx_ref' => $txn,
        'amount' => $amount,
        'currency' => 'UGX',
        'payment_options' => 'card,mobilemoney',
        'redirect_url' => route('paymentdone.screen'),
        'customer' => [
            'email' => $customer->email,
            'name' => $customer->name
        ],
        'meta' => [
            'price' => $amount
        ],
        'customizations' => [
            'title' => 'Delivery Payment',
            'description' => $description
        ]
    ];


    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $flutterurl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer {$flutterapi}",
        'Content-Type: application/json'
    ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($response);
    //return (object) array('link'=>$res->data->link,'status'=>$res->status);
    //return response()->json(['x'=>$res]);
    return $res->data->link;
    }
    public function flutterlinkticket($txn,$amount,$description,$customer){
        $flutterapi =  env('FLW_SECRET_KEY');
        $flutterurl = env('FLW_URL');
        $request = [
        'tx_ref' => $txn,
        'amount' => $amount,
        'currency' => 'UGX',
    //    "subaccounts"=> [
    //     (object)[
    //           'id'=> $partner->sub_acc_id,
    //          'transaction_charge_type'=> $partner->ticketcommtype,
    //           'transaction_charge'=> $partner->ticketcomm,
    //    ]
    //       ],
        'payment_options' => 'card,mobilemoney',
        'redirect_url' => route('paymentdone.screen'),
        'customer' => [
            'email' => $customer->email,
            'name' => $customer->name
        ],
        'meta' => [
            'price' => $amount
        ],
        'customizations' => [
            'title' => 'Delivery Payment',
            'description' => $description
        ]
    ];


    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $flutterurl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer {$flutterapi}",
        'Content-Type: application/json'
    ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($response);

    //return (object) array('link'=>$res->data->link,'status'=>$res->status);
    //return response()->json(['x'=>$res]);
    return $res->data->link;
    }


    public function redirect(){
        $ptconfirm = request()->all();
        if(request()->status == 'successful'){
            Order::where('txn',request()->tx_ref)->update([
                'pt_transaction_id'=>request()->transaction_id,
                'ptstatus' => 1
            ]);
            $order = Order::where('txn',request()->tx_ref)->first();
            $msg = "Order has been completed successfully";
            $txn = request()->tx_ref;
            //$otpclass = new OtpController();
           // $phonenumber = $order->recipientnumber;
            //$message = $order->originnumber.'has sent you a parcel with id '.request()->tx_ref.' keep this code for verification';
           // $otpclass->sendOtp($phonenumber,$message);
          }
        return view('site.donepayment',compact('ptconfirm'));
    }

}
