@extends('layouts.app')
@section('content')

@include('flash::message')

<form method="POST" action="{{action('UserController@update', ['user'=>$user->id])}}">
	<p>Name</p>
	<input type="text" name="name" class="form-control" value="{{$user->name}}"/><br><br>
	
	<p>Email</p>
	<input type="text" name="email" class="form-control" value="{{$user->email}}"/><br><br>

	<p>Підрозділ</p>
	<input type="text" name="section" class="form-control" value="{{$user->section}}"/><br><br>
	<p>Статус</p>

	<input id="checkGroup" type="hidden" name="group" value="{{$user->group}}">

@if	(\Auth::user())
	@if(\Auth::user()->group=='superAdmin')
		<td>
			@if(empty($user->group))
				Не активований.
				<button onclick="checkUp()" >Активувати</button> 
			@else
				Активний
				<button onclick="checkDown()" >Обмежити</button> 
			@endif
		</td>
	@endif
@endif
	<input type="hidden" name="_method" value="put"/>
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	
	<br>
	<input type="submit" value="Зберегти">

</form>


@endsection