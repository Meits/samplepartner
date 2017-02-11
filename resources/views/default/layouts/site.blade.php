<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
  
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset(config('settings.theme').'/favicon.ico')}}">

    <title>{{$title or 'Page'}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset(config('settings.theme').'/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset(config('settings.theme').'/css/style.css')}}" rel="stylesheet">
    <link href="{{asset(config('settings.theme').'/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    
    
    <script src="{{asset(config('settings.theme').'/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset(config('settings.theme').'/js/moment.js')}}"></script>
    <script src="{{asset(config('settings.theme').'/js/bootstrap-datetimepicker.min.js')}}"></script>
<!--<script src="{{asset(config('settings.theme').'/js/ckeditor/ckeditor.js')}}"></script>-->
    <script src="{{asset(config('settings.theme').'/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset(config('settings.theme').'/js/comment-reply.js')}}"></script>
	
	<script src="{{asset(config('settings.theme').'/js/script.js')}}"></script>
	

    
  </head>

  <body>

    <div class="container">
<div class="wrap_result"></div>
      <div class="masthead">
        <h3 class="text-muted">Sample PARTNER</h3>
        <nav>
        @yield('navigation')
        @if(Auth::check())
        
        <hr />
        
        <div class="row">
        
        	<div class="col-sm-10">
        	
        		<span style="font-size:1.8em; font-style: italic; font-weight: bold">
        			{{ Auth::user()->firstname}}  {{ Auth::user()->lastname}}  {{ Auth::user()->soname}} </span>
        	
        	</div>
        	
        	<div class="col-sm-2">
        	
	        	<form style="float: right !important" style="margin-right:30px" class="pull-left" action="{{route('logout')}}" method="POST">
					 {{ csrf_field() }}
					<button class="btn btn-success" type="submit">LogOut</button>
				</form>	
        	
        	</div>
        
        </div>
        
        <hr />
        	
		@endif
          
        </nav>
      </div>

      <!-- Example row of columns -->
      <div class="row">
      
      
      			@if (isset($errors) && count($errors) > 0)
				    <div style="padding:10px" class="bg-danger">
				        
				            @foreach ($errors->all() as $error)
				                <p>{{ $error }}</p>
				            @endforeach
				   
				    </div>
				@endif
				
				@if (session('status'))
				    <div style="padding:10px" class="bg-success">
				        {{ session('status') }}
				    </div>
				@endif
				
				@if (session('error'))
				    <div style="padding:10px" class="bg-danger">
				        {{ session('error') }}
				    </div>
				@endif
				
				
       @yield('content')
      </div>

      @yield('footer')

    </div> <!-- /container -->

  </body>
</html>
