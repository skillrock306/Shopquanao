<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use TCG\Voyager\Models\ShippingAddress;
use TCG\Voyager\Models\Order;
use TCG\Voyager\Models\OrderDetail;
use Illuminate\Support\Str;
use Cart;
use Auth;	

class CheckoutController extends Controller
{
    public function checkout()
    {
        $userId = !empty(Auth::user()) ? Auth::user()->id : null;
        if (empty($userId))
        {
            return view('frontend.login');
        }

        $carts = \Cart::getContent();
        $userAddresses =  DB::table('shipping_addresses')
            ->select('id', 'customer_address', 'is_default')
            ->where('customer_id', $userId)
            ->get();

        $userData = DB::table('customers')
            ->select('id', 'name', 'phone_number', 'email')
            ->where('id', $userId)
            ->first();

        return view('frontend.checkout', compact('carts', 'userAddresses', 'userData'));
    }

    public function storeCheckout(Request $request)
    {
    	$customerAddress = $request->input('address');

    	if ($customerAddress == 0) {
    		$newAddress = $request->input('new-address');
    		$shippingAddress = new ShippingAddress;
    		$shippingAddress->customer_id = Auth::user()->id;
    		$shippingAddress->customer_address = $newAddress;
    		$shippingAddress->is_default = 0;
    		$shippingAddress->save();
    		$shippingAddressId = $shippingAddress->id;
    	} else {
    		$shippingAddressId = $customerAddress;
    	}

    	$carts = \Cart::getContent();
    	$order = new Order;
    	$order->code = Str::random(10);
    	$order->customer_id = Auth::user()->id;
    	$order->total = \Cart::getTotal();
    	$order->product_total = \Cart::getSubTotal();
    	$order->shipping_address_id = $shippingAddressId;
    	$order->status = 'INACTIVE';
    	$order->payment_method = $request->input('payment-method');
    	$order->save();

    	foreach ($carts as $key => $cart) {
    		$orderDetail = new OrderDetail;
    		$orderDetail->order_id = $order->id;
    		$orderDetail->product_id = $cart->attributes->product_id;
    		$orderDetail->variant_id = $cart->id;
    		$orderDetail->quantity = $cart->quantity;
    		$orderDetail->product_price = $cart->price;
    		$orderDetail->save();
    	}

    	return redirect('complete/' . $order->id);
    }

    public function complete(Request $request, $orderId)
    {
        $orderData = DB::table('orders')
            ->where('id', $orderId)
            ->where('customer_id', Auth::user()->id)
            ->first();

        return view('frontend.complete', compact('orderData'));
    }
}