@extends('layouts.app')
@section('content')
@if(Session::has('message'))
	<div id="comment" class="alert alert-danger">
		{{Session::get('message')}}
	</div>
@endif
		
			{!!$section.'Звіт до бухгалтерії про проходження та використання лікарських засобів та виробів медичного призначенння №'!!}
<form method="POST" action="{{action('FrontController@store')}}">
<p>за 	<select id="mounth" name="mounth">
			<option selected value="січень">січень</option>		
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


 <input type="number" name="year" id="year" value="20">р.</p>


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
@foreach ($preparat as $key => $prep)
	

	<tr>
		<td>{{$key + 1}}</td>
		<td>
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<input name="id_preparat{{$key}}" type="hidden" value="{{$prep->id}}">
			
			<input name="title{{$key}}" type="text" value="{{$prep->title}}">
		</td>
		<td><input name="unit{{$key}}" type="text" value="{{$prep->units}}"></td>
		<td><input name="ext{{$key}}" type="date" value="{{date("Y-m-d")}}" min="{{date("Y-m-d")}}"></td>
		<td><input name="start{{$key}}" id="start{{$key}}" type="text" oninput="oninputt('<? echo $key ?>');"></td>
		<td><input name="prihod{{$key}}" id="prihod{{$key}}" type="text" oninput="oninputt('<? echo $key ?>');"></td>
		<td><input name="vykor{{$key}}" id="vykor{{$key}}" type="text" oninput="oninputt('<? echo $key ?>');"></td>
		<td><input name="result{{$key}}" id="result{{$key}}" type="text"></td>
		
		
	</tr>
@endforeach

	</table>

<input type="submit" value="Сохранить">

</form>		
@endsection