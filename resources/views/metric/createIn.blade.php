@extends('layouts.app')
@section('content')

@include('flash::message')

<form method="POST" action="{{action('MetricController@update')}}">
	
	<table id="tableReport" class="table" border="1">
		<tr>
			<td>Номер</td>
			<td>Найменування</td>
			<td>Одиниця виміру</td>			
			<td>Термін</td>			
			<td>Прийнято</td>	
			<td>Залишок на кін. місця</td>			
		</tr>
		
			@foreach ($reports as $key => $report)
				<tr>
					<td>{{$key + 1}}</td>
					<td name="preparat_name{{$key}}">{{$report->preparat_name}}</td>
					<td name="preparat_unit{{$key}}">{{$report->preparat_unit}}</td>
					<td name="termin{{$key}}">{{$report->termin}}</td>
					<td><input name="in{{$key}}" id="in{{$key}}" type="text" onsubmit="editIn(<?php echo $key ?>);"></td>
					<td name="res{{$key}}" id="res{{$key}}">{{$report->result}}</td>
				
				</tr>
			@endforeach

	</table>
	
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>					
	<input type="submit" value="Зберегти">

</form>





@endsection