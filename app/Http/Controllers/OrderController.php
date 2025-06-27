<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController
{
    private function generateReferenceId($type, $date, $id = 0)
    {
        $reference_id = '';

        if ($type == 'online'){
            $reference_id .= 'OL';
        } else if ($type == 'walk_in'){
            $reference_id .= 'WI';
        } else if ($type == 'government'){
            $reference_id .= 'GV';
        } else if ($type == 'project_based'){
            $reference_id .= 'PB';
        }

        return $reference_id . '-' . $date . '-' . str_pad($id, 4, '0', STR_PAD_LEFT);
    }

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
            'reference_id' => $this->generateReferenceId('online', now()->format('dmY'), Auth::user()->id),
            'user_id' => Auth::user()->id,
            'total_amount' => $request->total,
            'type' => 'online',
            'expiry_date' => now()->addWeek()->toDateString(),
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
        // return redirect()->route('landing.page')->with([
        //     'showCard' => true,
        //     'orderId' => $order->id,
        // ]);
    }
}
