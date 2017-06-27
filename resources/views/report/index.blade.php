@extends('layouts.app')
@section('content')

	@foreach($captions as $caption)

		<h3><a href="{{action('ReportController@show', ['id'=>$caption->id])}}">{{$caption->section}}</a></h3>
		<h5>{{$caption->mounth}}</h5>
		<h5>{{$caption->year}}</h5>

		
		<hr>
		
		
	@endforeach
	
@endsection