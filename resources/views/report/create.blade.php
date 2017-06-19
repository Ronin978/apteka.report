@extends('layouts.app')
@section('content')
@if(Session::has('message'))
	<div id="comment" class="alert alert-danger">
		{{Session::get('message')}}
	</div>
@endif

<form method="POST" action="{{action('ReportController@store')}}"/>
	<textarea class="tinyMCE">
			{!!$section.'<br>'.'Звіт до бухгалтерії про проходження та використання лікарських засобів та виробів медичного призначенння №'!!}

		</textarea>
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

	@foreach($reports as $report)	
		<tr>
			<td></td>
			<td>{{$report->}}</td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>

		<input type="hidden" name="_token" value="{{csrf_token()}}"/>

	</table>
	
</form>

@endsection