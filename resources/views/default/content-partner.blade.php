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
					@foreach($rule->orders as $order)
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
							<td>{{ $order->total_paid}}</td>
							
						</tr>
						
					@endforeach
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