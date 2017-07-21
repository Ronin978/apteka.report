@extends('layouts.app')
@section('content')

@include('flash::message')


<h2>звіт за {{$caption->mounth}} місяць</h2>

	<table id="tableReport" class="table" border="1">
		<tr>
			<td>Номер</td>
			<td>Найменування</td>
			<td>Одиниця виміру</td>			
			<td>Термін</td>	
			<td>Видано</td>			
			<td>Залишок на кін. місця</td>			
		</tr>
		
			@foreach ($reports as $key => $report)
				<tr >
					<td>{{$key + 1}}</td>
					<td>{{$report->preparat_name}}</td>
					<td>{{$report->preparat_unit}}</td>
					<td>{{$report->termin}}</td>
					<td></td>
					<td>{{$report->result}}">{{$report->result}}</td>

				</tr>
			@endforeach

	</table>
						
	<input type="submit" value="Зберегти">



@endsection