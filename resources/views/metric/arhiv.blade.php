@extends('layouts.app')
@section('content')
	@include('flash::message')
	
	@foreach($metrics as $metric)
		
			@if ($metric->type == 'input')
				<h3><a href="{{action('MetricController@show', ['id'=>$metric->id])}}">Прихід</a></h3>
			@elseif ($metric->type == 'output')
				<h3><a href="{{action('MetricController@show', ['id'=>$metric->id])}}">Видача</a></h3>
			@else
				<h3><a href="{{action('MetricController@show', ['id'=>$metric->id])}}">Невідома операція</a></h3>
			@endif
			<h5>Оновлено: {{$metric->updated_at}}</h5>
			<h5>Створено: {{$metric->created_at}}</h5>

			
			<hr>
		
		
	@endforeach

<div class="myPaginate">
	{{ $metrics->links() }}
</div>
	
@endsection