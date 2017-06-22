@extends('layouts.app')
@section('content')

	@foreach($captions as $caption)

		<h3>{{$caption->section}}</h3>
		<h5>{{$caption->mounth}}</h5>
		<h5>{{$caption->year}}</h5>

		
		<hr>
		
		
	@endforeach
	
@endsection