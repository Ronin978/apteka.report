@extends('layouts.app')
@section('content')
	@include('flash::message')
	
	<h2>Виберіть звіт до якого внести зміни</h2>

	@foreach($captions as $caption)

		<h3>{{$caption->section}}</h3>
		<h5>{{$caption->mounth}}</h5>
		<h5>{{$caption->year}}</h5>
		<a href="{{action('MetricController@editIn', ['id'=>$caption->id])}}">Прийняти</a> &nbsp/ 
		<a href="{{action('MetricController@editUp', ['id'=>$caption->id])}}">Видати</a>
		<hr>
		
		
	@endforeach
	
@endsection