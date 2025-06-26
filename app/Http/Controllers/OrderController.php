<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController
{
    public function createOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'total' => 'required',
            'payment_method' => 'required',
        ], [
            'total.required' => 'Total Amount is required',
            'payment_method.required' => 'Please select payment type.'
        ]);

        $cartItems = session()->get('cartItems', []);

        if ($validator->fails()){
            $message = $validator->errors()->first();
            notyf()->error($message);
            return redirect()->back();
        }

        if ($request->payment_method == 'e-wallet'){
            return; //for now
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_amount' => $request->total,
            'type' => 'online',
        ]);

        foreach($cartItems as $item){
            OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $item->id,
            'quantity' => $item->quantity,
            ]);
        }

        session()->forget('cartItems');

        notyf()->success('Order placed successfully');
        return redirect()->route('landing.page');
    }
}
