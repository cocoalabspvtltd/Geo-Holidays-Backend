<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentlink(Request $request)
    {
        $fields =$request->validate([
            'amount' =>'required',
            'name' => 'required|string',
            'email' => 'required|email'
            ]);
        $name = $fields['name'];
        $email = $fields['email'];
        $amount =$fields['amount'];
        $key = "rzp_test_eRWap5XvUyMtNa";
        $token = "EMRRKmTz4gy9rYfhZODsRUdB";

         $url ="https://api.razorpay.com/v1/orders";
         $rec = "KTT_".date('Y'.'m'.'d'.'H'.'i'.'s');
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_USERPWD, $key.":".$token);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array("content-type: application/json"));
         $data = <<<JSON
         {
           "amount":"$amount" ,
           "currency": "INR",
           "receipt": "receipt#1",
           "notes": {
           "name": "$name",
           "email": "$email"

            }
         }
         JSON;
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         $response = curl_exec($ch);
         $decode = json_decode($response);
         $orderID = $decode->id;
         $amount = $decode->amount * 100;


         $response= [
            'order_id' => $orderID,
            'amount' =>  $amount,
            'key_id' => $key,
            'key_secret' => $token,
            'message' => 'Payment link',
            'status' => 'true'
        ];

        return response($response, 201);
    }

    public function payment(Request $request)
    {

        $fields =$request->validate([
             'payment_id' => 'min:2|max:100',
           ]);
           $payment_id=$fields['payment_id'];

           $key = "rzp_test_eRWap5XvUyMtNa";
           $token = "EMRRKmTz4gy9rYfhZODsRUdB";

           // Generated @ codebeautify.org
           $ch = curl_init();

           curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/'.$payment_id.'');
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

           curl_setopt($ch, CURLOPT_USERPWD, $key.":".$token);
           $result = curl_exec($ch);
           if (curl_errno($ch)) {
               echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            $decode = json_decode($result);
            $payment_id =$decode->id;
            $amount= $decode->amount;
            $method=$decode->method;
            $name=$decode->notes->name;
            $email=$decode->notes->email;
            $bank_name=$decode->bank;
            $bank_transaction_id=$decode->acquirer_data->bank_transaction_id;
            $epoch=$decode->created_at;
            $date = date('c', $epoch);
            $created_date=date("Y-m-d",strtotime($date));
            $payment_status=$decode->status;


            $transaction =Transaction::create([
                'name' => $name,
                'email' => $email,
                'payment_id' =>$payment_id,
                'amount' =>$amount,
                'payment_status' =>$payment_status,
                'payment_method' => $method,
                'bank_name' =>$bank_name,
                'bank_transaction_id' =>$bank_transaction_id
            ]);

             $response= [
            'transaction' => $transaction,
            'message' => 'Paid Successfully',
            'status' => 'true'
        ];

        return response($response, 201);
     }

}
