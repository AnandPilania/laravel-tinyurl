<!doctype html>
<html>
	<head>
		<title>@yield('title')</title>
		@yield('head')
	</head>
	<body>
		@section('content')
			@show
			
		@if(session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif
			
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		@yield('foot')
	</body>
</html>