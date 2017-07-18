@extends('layouts.app')
@section('content')

@include('flash::message')


<h2>звіт за {{$caption->mounth}} місяць</h2>

<form method="POST" action="{{action('MetricController@update',['id'=>$caption->id])}}" onSubmit="return confirm('Підтвердити?')">
	
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

					<input type="hidden" name="id_preparat{{$key}}" value="{{$report->id_prep}}"/>

					<td>{{$report->preparat_name}}</td>
					<td>{{$report->preparat_unit}}</td>
					<td>{{$report->termin}}</td>
					<td> <input name="in{{$key}}" id="in{{$key}}" type="text"></td>
					<td><input type="hidden" name="res{{$key}}" value="{{$report->result}}">{{$report->result}}</td>				
				</tr>
	
			@endforeach

	</table>
	
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>	
	<input type="hidden" name="_method" value="put"/>
	<input type="hidden" name="type" value="input"/>
	
	<input type="submit" value="Зберегти">

</form>





@endsection