@extends('layouts.app')

@section('content')

@include('flash::message')

	<h1>{{$user->name}}</h1>

	@if ($user->preview)
		<img class="popup" tabindex="1" src={{$user->preview}}>;
	@endif

	<p>Ви знаходитесь у групі: {{$user->group}}</p>

	<p>Email: {{$user->email}}</p>

	<p>Підрозділ: {{$user->section}}</p>

	<p>Аккаунт створено: {{$user->created_at}} </p>


<button onclick="location.href='{{route('myEdit')}}'">Редагувати</button>
<hr>
@if(\Auth::user())
<?php 
	$group=\Auth::user()->group;
?>
    @if($group=='admin' || $group=='superAdmin')
		<ul>
			@if(\Auth::user()->group=='superAdmin')
			<li><a href="{{action('UserController@myshow')}}">Керування профілями</a></li>
			<hr>
			@endif
			<li><a href="{{action('PrepController@create')}}">Add PreparatName</a></li>
			<hr>
			<li><a href="{{action('ReportController@create')}}">Add Report</a></li>
			
			<hr>

		</ul>
	@endif
@endif






@endsection 