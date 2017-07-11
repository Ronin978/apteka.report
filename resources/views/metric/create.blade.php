@extends('layouts.app')
@section('content')

@include('flash::message')

<form method="POST" action="MetricController@store">
	
	<table id="tableReport" class="table" border="1">
		<tr>
			<td>Номер</td>
			<td>Найменування</td>
			<td>Одиниця виміру</td>			
			<td>Прийнято</td>			
			<td>Видано</td>			
			<td>Залишок на кін. місця</td>			
		</tr>
		
			@foreach ($preps as $key => $prep)
				<tr id="{{$key + 1}}">
					<td>{{$key + 1}}</td>
					<td>{{$prep->title}}</td>
					<td>{{$prep->units}}</td>					
					<td><input name="prihod{{$key}}" id="prihod{{$key}}" type="text" oninput="oninputt('<? echo $key ?>');"></td>
					<td><input name="vykor{{$key}}" id="vykor{{$key}}" type="text" oninput="oninputt('<? echo $key ?>');"></td>
					<td><input name="result{{$key}}" id="result{{$key}}" type="text"></td>				
				</tr>
				
				<input name="id_preparat{{$key}}" type="hidden" value="{{$prep->id}}">
			@endforeach

	</table>
	
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>					
	<input type="submit" value="Зберегти">

</form>





@endsection