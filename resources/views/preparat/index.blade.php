@extends('layouts.app')
@section('content')
<table class="table" border="1" >
	<tr>
		<td>id</td>
		<td>Назва</td>
		<td>Одиниця виміру</td>>
		<td>Действие</td>
		
	</tr>
@foreach ($prep as $preparat)
	<tr>
		<td>{{$preparat->id}}</td>
		<td>{{$preparat->title}}</td>
		<td>{{$preparat->units}}</td>
		<td>
			<button onclick="location.href='{{action('PrepController@edit',['preparat'=>$preparat->id])}}'">Редагувати</button>

			<form method="POST" action="{{action('PrepController@destroy',['id'=>$preparat->id])}}" onSubmit='return confirm("Для видалення натисніть OK?");'>
				<input type="hidden" name="_method" value="delete"/>
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="submit" value="Видалити"/>
			</form>
		</td>
		
	</tr>
@endforeach

</table>

<a href="{{action('PrepController@create',['preparat'=>$preparat->id])}}">Додати новий</a>

@endsection