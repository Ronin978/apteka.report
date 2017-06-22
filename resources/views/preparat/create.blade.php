@extends('layouts.app')
@section('content')
	<form method="POST" action="{{action('PrepController@store')}}"/>
		Назва препарату<br>
		<input type="text" name="title"/><br>
		Одиния виміру<br>
		<input type="text" name="units"/><br>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<input type="submit" value="Зберегти">	
	</form>
	@include('flash::message')
@endsection