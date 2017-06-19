@extends('layouts.app')
@section('content')

	<form method="POST" action="{{action('PrepController@update',['prep'=>$prep->id])}}"/>
		Название категории<br>
		<input type="text" name="title" value="{{$prep->title}}"/><br>
		<input type="text" name="units" value="{{$prep->units}}"/><br>
		<input type="hidden" name="_method" value="put"/>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<input type="submit" value="Сохранить">
		
	</form>
@endsection