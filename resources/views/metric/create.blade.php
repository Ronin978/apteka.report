@extends('layouts.app')
@section('content')

@include('flash::message')

<form method="POST" action="MetricController@store">
	
	<table id="tableReport" class="table" border="1">
		<tr>
			<td>Номер</td>
			<td>Найменування</td>
			<td>Одиниця виміру</td>			
			<td>Термін</td>			
			<td>Прийнято</td>			
			<td>Видано</td>			
			<td>Залишок на кін. місця</td>			
		</tr>
		
			@foreach ($reports as $key => $report)
				<tr id="{{$key + 1}}">
					<td>{{$key + 1}}</td>
					<td>{{$report->preparat_name}}</td>
					<td>{{$report->preparat_unit}}</td>
					<td>{{$report->termin}}</td>
					<td><input name="in{{$key}}" id="in{{$key}}" type="text" onkeypress="oninput2(<?php echo $key ?>);"></td>
					<td><input name="up{{$key}}" id="up{{$key}}" type="text" onkeypress="oninput2(<?php echo $key ?>);"></td>
					<td name="res{{$key}}" id="res{{$key}}">{{$report->result}}</td>
				
				</tr>
			@endforeach

				

	</table>
	
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>					
	<input type="submit" value="Зберегти">

</form>





@endsection