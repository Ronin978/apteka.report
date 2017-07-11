@extends('layouts.app')
@section('content')

@include('flash::message')

	<p align="center">
		{{$section}}
		<br>
		Звіт до бухгалтерії про проходження та використання лікарських засобів та виробів медичного призначенння №		

		<p align="center">за {{$mounth}}
 			{{$year}}р.
		
		
 		</p>
 	</p>


	<table id="tableReport" class="table" border="1">
		<tr>
			<td>Номер</td>
			<td>Найменування</td>
			<td>Одиниця виміру</td>
			<td>Термін<br> придатності</td>
			<td>Залишок на поч. місця</td>
			<td>надходження</td>
			<td>використання</td>
			<td>Залишок на кін. місця</td>
			
		</tr>
			@foreach ($reports as $key => $report)
				<tr id="{{$key + 1}}">
					<td>{{$key + 1}}</td>
					<td>{{$report->preparat_name}}</td>
					<td>{{$report->preparat_unit}}</td>
					<td>{{$report->termin}}</td>
					<td>{{$report->all}}</td>
					<td>{{$report->prihod}}</td>
					<td>{{$report->vykor}}</td>
					<td>{{$report->result}}</td>
				
				</tr>
			@endforeach

	</table>
			
	<a onClick="javascript:CallPrint('pagePrint');">Роздрукувати</a>
	
@endsection