@extends(config('settings.theme').'.layouts.site')

@section('content')
	{!! $content !!}
@endsection

@section('footer')
	{!! $footer !!}
@endsection