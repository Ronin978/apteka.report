@extends('layouts.app')
@section('content')
@if(Session::has('message'))
	<div id="comment" class="alert alert-danger">
		{{Session::get('message')}}
	</div>
@endif
		
			{!!$section.'Звіт до бухгалтерії про проходження та використання лікарських засобів та виробів медичного призначенння №'!!}

		
	<table class="table" border="1">
	<tr>
		<td>Номер</td>
		<td>Найменування</td>
		<td>Одиниця виміру</td>
		<td>Термін придатності</td>
		<td>Залишок на поч. місця</td>
		<td>надходження</td>
		<td>використання</td>
		<td>Залишок на кін. місця</td>
		
	</tr>
@foreach ($preparat as $prep)
	<tr>
		<td></td>
		<td>{{$prep->title}}</td>
		<td>{{$prep->units}}</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
@endforeach
<a href="{{action('ReportController@create',['preparat'=>$preparat->id])}}">Додати новий</a>

</table>

@endsection