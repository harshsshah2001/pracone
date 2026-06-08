<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class UserService
{
    public function showform()
    {
        return view('form');
    }
    public function submitform($request)
    {
        $alldata = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'amount' => 'required|numeric',
        ]);

        $amount = $alldata['amount'] * 100; // Convert to paise


        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_SECRET'));
        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          => $alldata['amount'] * 100, // Amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // Auto capture
        ];
        $order = $api->order->create($orderData);
        return view('payment', ['order_id' => $order['id'], 'amount' => $amount, 'name' => $alldata['name'], 'email' => $alldata['email'], 'phone' => $alldata['phone']]);
    }

    public function storePayment($request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'payment_id' => 'required|string',
            'amount' => 'nullable|numeric',
        ]);

        Payment::create($data);

        return response()->json(['success' => true]);
    }
}
