@extends('layouts.app')
@section('content')
	<form method="POST" action="{{action('PrepController@store')}}"/>
		Название категории<br>
		<input type="text" name="title"/><br>
		<input type="text" name="units"/><br>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<input type="submit" value="Сохранить">
		@if(Session::has('message'))
		{{Session::get('message')}}
		@endif
	</form>
@endsection