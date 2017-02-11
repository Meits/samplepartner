<div class="container">
	<div class="col-sm-12 blog-main">
		
	
		@if($order)
			
				<h2>Детали заказа - {{ $order->reference }}</h2>
				<br />
				<h4>Покупатель: {{$order->customer->lastname}} {{$order->customer->firstname}}</h4>
				<p>Почта: {{$order->customer->email}}</p>
				<p>Телефон: 
				@foreach($order->customer->address as $address)
					{{$address->phone_mobile}}<br />
				@endforeach
				</p>
				<br />
				<h4>История заказа (статусы обработки)</h4>
				@foreach($order->orderState as $orderState)
					<p style="background-color: {{$orderState->color}}">{{$orderState->stateLang->name}}</p>
				@endforeach
				<br />
				<h4>Товары в заказе</h4>
				
				<table class="table">
				
					<thead>
						<th>ID</th>
						<th>Позиция</th>
						<th>Цена</th>
						<th>Ок.цена</th>
						<th>Категория</th>
						<th>Процент Пр.</th>
						<th>Сумма</th>
					</thead>
					<tbody>
					<?php $total = 0;?>
						@foreach($order->orderDetail as $detail)
							<tr>
								<td>{{$detail->product_id}}</td>
								<td>{{$detail->product_name}}</td>
								<td>{{$detail->product_price}}</td>
								<td>{{$detail->original_product_price}}</td>
								<td>{{$detail->product->category->name}}</td>
								<td>{{$detail->product->category->discount->discount or 3}}%</td>
								
								
								<?php
								$summ = (($detail->product->category->discount->discount ) ?$detail->product->category->discount->discount * $detail->original_product_price : 3* $detail->original_product_price)/100;
								$total += $summ;
								?>
								
								<td>{{$summ}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
				<br />
				<h3>Итого к выплате по заказу: {{$total}}</h3>
				<h3>Статус оплаты партнеру: 
				@if($order->orderPay && $order->orderPay->order_pay)
					<span style="background-color: green">Оплочено</span>
				@else	
					<span style="background-color: red">Не оплочено</span>	
				@endif
				</h3>
		@endif
	
	</div>	  
	<!--<div class="col-sm-4">
		@if(isset($sideBar) && !empty($sideBar)) 
			{!! $sideBar !!}
		@endif
	</div>-->          
</div>