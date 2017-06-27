@extends('layouts.app')
@section('content')

@include('flash::message')
<form method="POST" action="{{action('ReportController@store')}}">		
	<input name="section" type="hidden" value="{{$section}}">

	<p align="center">
		{{$section}}
		<br>
		Звіт до бухгалтерії про проходження та використання лікарських засобів та виробів медичного призначенння №
				

		<p align="center">за 	
			<select id="mounth" name="mounth" >
				<option selected value="{{$mounth}}">січень</option>		
				<option value="лютий">лютий</option>		
				<option value="березень">березень</option>		
				<option value="квітень">квітень</option>		
				<option value="травень">травень</option>		
				<option value="червень">червень</option>		
				<option value="липень">липень</option>		
				<option value="серпень">серпень</option>		
				<option value="вересень">вересень</option>		
				<option value="жовтень">жовтень</option>		
				<option value="листопад">листопад</option>		
				<option value="грудень">грудень</option>		
					
			</select>


 			<input size="10" type="number" name="year" id="year" value="{{$year}}" >р.
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
			@foreach ($preps as $key => $prep)
				<tr id="{{$key + 1}}">
					<td>{{$key + 1}}</td>
					<td>					
						<input name="title{{$key}}" type="text" value="{{$prep->title}}">
					</td>
					<td><input id="" oninput="oninputtt('<? echo $key ?>')" name="units{{$key}}" type="text" value="{{$prep->units}}"></td>
					<td><input name="termin{{$key}}" type="date" value="{{date("Y-m-d")}}" min="{{date("Y-m-d")}}"></td>
					<td><input name="all{{$key}}" id="all{{$key}}" type="text" oninput="oninputt('<? echo $key ?>');"></td>
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

<button id="addr" onclick="onAdd()">Додати препарат</button>	
	
		<div id="contadd"></div>
	
@endsection