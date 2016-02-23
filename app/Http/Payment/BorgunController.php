<?php

namespace App\Http\Payment;

use Illuminate\Http\Request;

use App\Http\Payment\Borgun;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BorgunController extends Controller
{
	public function success(Request $request)
	{
		$orderid = $request->get('orderid');
 	   	$orderhash = $request->get('orderhash');

	    if($orderid && $orderhash) {
	        $order = Order::where('reference', $orderid)->first();

	        if($order) {
	        	$borgun = new Borgun($order);

				if($borgun->verified($orderhash)) {
	            	$borgun->order->confirm();

	            	return view('frontend.checkout.complete')->with('order', $borgun->order);
	            }
	        }
	    }

	    dd('Villa kom upp við að staðfesta greiðslu!');
	}

	public function successserver()
	{
		$orderid = $request->get('orderid');
 	   	$orderhash = $request->get('orderhash');

	    if($orderid && $orderhash) {
	        $order = Order::where('reference', $orderid)->first();

	        if($order) {
	        	$borgun = new Borgun($order);

				if($borgun->verified($orderhash)) {
	            	$borgun->order->confirm();
	            }
	        }
	    }
	}

	public function error()
	{
		//return 'Villa kom upp við greiðslu!';
		return view('payment.borgun.error');
	}

	public function cancel()
	{
		//return 'Þú hefur hætt við greiðslu!';
		return view('payment.borgun.cancel');
	}
}