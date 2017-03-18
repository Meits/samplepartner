<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Gate;

use App\Order;
use App\OrderPay;

class PaymentController extends Controller
{
    //
    
    public function updateStatus(Request $request, $id) {
		
		$order = Order::find($id)->load('orderPay');
		
		$data = $request->all();
		
		if(!empty($order->orderPay)) {
			$order->orderPay->order_pay = $data['order_pay'];
			//dd($order);
			$order->orderPay->save();
		}
		else {
			$orderPay = new OrderPay(['order_pay'=>$data['order_pay']]);
			$order->orderPay()->save($orderPay);
		}

		return redirect('/partner');
	}
}
