<div class="container">
	<div class="col-sm-12 blog-main">
	<h3 class="title_page">Пользователи</h3>


<div class="short-table white">
	<table class="table table-striped">
	<thead>
		<th>ID</th>
		<th>Name</th>
		<th>Купон</th>
		<th>Role</th>
		<th>Удалить</th>
	</thead>
	@if($users)
		
		
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{!! Html::link(route('users.edit',['user' => $user->id]),$user->firstname.' '.$user->lastname .' '.$user->soname) !!}</td>
			<td>
				
				@foreach($user->rules as $rule)
					{!! $rule->code.'<br />' !!}
				@endforeach
			</td>
			<td>{{ $user->roles->implode('name', ', ') }}</td>


			<td>
			
			{!! Form::open(['url' => route('users.destroy',['user'=> $user->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
												    {{ method_field('DELETE') }}
												    {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
												{!! Form::close() !!}

			</td>
		</tr>										
		@endforeach
		
	@endif
	</table>
	</div>
	{!! Html::link(route('users.create'),'Добавить  пользователя',['class' => 'btn']) !!}

	
	</div>	  
	<!--<div class="col-sm-4">
		@if(isset($sideBar) && !empty($sideBar)) 
			{!! $sideBar !!}
		@endif
	</div>-->          
</div>