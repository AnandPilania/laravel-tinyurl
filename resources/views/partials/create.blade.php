@extends('tinyurl::master')
@section('title', 'Create Tinyurl')
@section('content')
	<form method='post' action='/tinyurl'>
		<label for='title'>Title</label>
		<input type='text' name='title' id='title' />
		<label for='url'>URL</label>
		<input type='text' name='url' id='url' />
		<input type='submit' value='Proceed' />
	</form>
	@endsection