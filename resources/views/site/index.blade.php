@extends('layouts.app')
@section('content')

	@foreach($reports as $report)

		<h3>{{$report->section}}</h3>
		<h5>{{$report->mounth}}</h5>
		<h5>{{$report->year}}</h5>

		
		<hr>
		
		
	@endforeach
	
@endsection