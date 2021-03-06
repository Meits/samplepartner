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
								<td>{{$detail->total_price_tax_excl}}</td>
								<td>{{$detail->product->category->name}}</td>
								<td>{{$detail->product->category->discount->discount or 10}}%</td>
								
								
								<?php
								if(is_object($detail->product->category->discount)) {
									$summ = ($detail->product->category->discount->discount * $detail->total_price_tax_excl)/100;
								}
								else {
									$summ =  (10 * $detail->total_price_tax_excl)/100;
								}
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
					<span style="background-color: green">Оплачено</span>
				@else	
					<span style="background-color: red">Не оплачено</span>	
				@endif
				
				@can('VIEW_ALL')
				{!!Form::open(['url' => route('updateStatus',['id'=>$order->id_order]),'class'=>'form-inline','method'=>'POST','enctype'=>'multipart/form-data'])!!}
					{!! Form::select('order_pay', ['0'=> 'Не оплачено','1'=>'Оплачено'],($order->orderPay && $order->orderPay->order_pay) ? $order->orderPay->order_pay : '0', ['class'=>'selectpicker','data-style'=>($order->orderPay && $order->orderPay->order_pay) ? 'btn-success' : 'btn-danger'] ) !!}
					{!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}			
		
				{!!Form::close()!!}
				@endcan
				
				
				</h3>
		@endif
	
	</div>	  
	<!--<div class="col-sm-4">
		@if(isset($sideBar) && !empty($sideBar)) 
			{!! $sideBar !!}
		@endif
	</div>-->          
</div>