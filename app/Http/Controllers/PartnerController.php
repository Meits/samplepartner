<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Gate;

use App\Order;

class PartnerController extends SiteController
{
    //
    public function __construct() {
    	parent::__construct();
    	
    	$this->template = config('settings.theme').'.partner';
	}
    
    
    public function index() {
    	
    	if(Gate::denies('VIEW_PARTNER')) {
    		return abort(403);
			//return redirect('/')->with('message','У Вас нет прав для просмотра данного разхдела');
		}
		
		if(Gate::allows('VIEW_ALL')) {
			$rules = \App\CartRule::has('orders')->get()->load('orders','ruleName');
			
			$rules->transform(function($item, $key) {
				$item->orders->load('orderPay');
				
				$item->orders->transform(function($item2, $key2) {
					if(!$item2->hasOrderState(3)) {
						return $item2;
					}
				});
				return $item;
			});
		}
		else {
			$rules = Auth::user()->rules->load('orders','ruleName');
		}
		
		
    	
    	
    	//$sideBar = view(config('settings.theme').'.sideBar')->with(['users'=>$users,'cyties'=>$citys])->render();
		
		$content = view(config('settings.theme').'.content-partner')->with(['rules'=>$rules])->render();
		$this->vars = array_add($this->vars,'content', $content);

    	
		return $this->renderOutput();
	}
	
	public function show($id) {
    	
    	if(Gate::denies('VIEW_PARTNER')) {
    		return abort(403);
			//return redirect('/')->with('message','У Вас нет прав для просмотра данного разхдела');
		}
    	
    	$order = Order::find($id)->load('orderPay','orderState','customer','orderDetail');
    	
    	
    	
    	$order->orderState->transform(function ($item, $key) {
		    $item->load('stateLang');
		    return $item;
		});
		
		$order->orderDetail->transform(function ($item, $key) {
		    $item->load('product');
		    $item->product->load('category');
		    $item->product->category->load('discount');
		    return $item;
		});
		//dd($order);
		
		$content = view(config('settings.theme').'.content-orderDetails')->with(['order'=>$order])->render();
		$this->vars = array_add($this->vars,'content', $content);

    	
		return $this->renderOutput();
	}
}
