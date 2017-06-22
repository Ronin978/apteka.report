@extends('layouts.app')
@section('content')
@include('flash::message')
<table class="table" border="1">
	<tr>
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>section</td>

			<td>group</td>

		<td>Действие</td>
		<td>Действие</td>
		
	</tr>
@foreach ($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->section}}</td>
		

			<td>
				@if(empty($user->group))
					Не призначено
				@else
					Активний
				@endif
			</td>


		<td><a href="{{action('UserController@edit',['user'=>$user->id])}}">Редагувати</a></td>
		<td>
			<div class="myBtnGroup">
				@if($user->deleted_at)
					<input type="button" onclick="location.href='{{action('UserController@restore',['id'=>$user->id])}}'" name="restore" value="Відновити">
				@else
					<form method="POST" onSubmit='return confirm("Для деактивації натисніть OK?");' action="{{action('UserController@destroy',['user'=>$user->id])}}">
						<input type="hidden" name="_method" value="delete"/>
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<input type="submit" value="Забанити"/>
					</form>
				@endif
				
				<form action="{{action('UserController@delete',['id'=>$user->id])}}" onSubmit='return confirm("Для видалення натисніть OK?");'>
					<input type="submit" name="delete" value="Видалити">
				</form>
			</div>
		</td>
		
	</tr>
@endforeach

</table>

@endsection