<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
  
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset(config('settings.theme').'/favicon.ico')}}">

    <title>{{$title or 'Page'}}</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">


    <!-- Custom styles for this template -->
    <link href="{{asset(config('settings.theme').'/css/style.css')}}" rel="stylesheet">
    <link href="{{asset(config('settings.theme').'/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    
    
    <script src="{{asset(config('settings.theme').'/js/jquery-3.1.1.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{asset(config('settings.theme').'/js/moment.js')}}"></script>
    <script src="{{asset(config('settings.theme').'/js/bootstrap-datetimepicker.min.js')}}"></script>
<!--<script src="{{asset(config('settings.theme').'/js/ckeditor/ckeditor.js')}}"></script>-->
    <script src="{{asset(config('settings.theme').'/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset(config('settings.theme').'/js/comment-reply.js')}}"></script>
    
    

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	
	<script src="{{asset(config('settings.theme').'/js/script.js')}}"></script>
	

<script>
jQuery(document).ready(function () {
    jQuery('.selectpicker').selectpicker();
});
</script>
    
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
