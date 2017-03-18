<div class="container">
	<div class="col-sm-12 blog-main">
	
	
		@if(!$rules->isEmpty())
			@foreach($rules as $rule)
				<h2>Заказы по купону - {{ $rule->ruleName->name }}</h2>
				<table class="table table-striped">
					<tbody>
						<th>ID</th>
						<th>Код заказа</th>
						<th>ФИО Покупателя</th>
						<th>Телефоны</th>
						<th>Почта</th>
						<th>Сумма заказа</th>
					</tbody>
					@if(isset($rule->orders) && !empty($rule->orders))
					
					@foreach($rule->orders as $order)
						@if(empty($order))
							@continue
						@endif
						<tr>
							
							<td>{{ $order->id_order}}</td>
							<td>
							
							{!! Html::link(route('partner.detail',array('id'=>$order->id_order)),$order->reference) !!}


							</td>
							<td>{{ $order->customer->firstname." ". $order->customer->lastname}}</td>
							<td>
								@foreach($order->customer->address as $address)
									{{$address->phone_mobile}}<br />
								@endforeach
							</td>
							<td>{{ $order->customer->email}}</td>
							<td>{{ $order->total_paid}} &nbsp;&nbsp;&nbsp;
							
							@can('VIEW_ALL')
								@if($order->orderPay && $order->orderPay->order_pay)
									<span style="background-color: green">Оплачено</span>
								@else	
									<span style="background-color: red">Не оплачено</span>	
								@endif
							@endcan
							
							</td>
							
						</tr>
						
					@endforeach
					
					
					@endif 
					
				</table>
			@endforeach
		@endif
	
	</div>	  
	<!--<div class="col-sm-4">
		@if(isset($sideBar) && !empty($sideBar)) 
			{!! $sideBar !!}
		@endif
	</div>-->          
</div>