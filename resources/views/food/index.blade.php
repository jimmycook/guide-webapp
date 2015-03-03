@extends('app')

@section('content')
	<div class="container">	
		@include('flash::message')
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Food</h4>
			</div>
			<div class="panel-body">
			@if(count($foods))
				@foreach($foods as $food)
						<h4>{{ $food->name }}</h4>
						<p>{{ $food->description }}</p>
						<p class="text-muted text-right">{{ $food->created_at->diffForHumans() }} <a href="{{ url('/food/'.$food->slug) }}"><span class="glyphicon glyphicon-link"></span></a></p>
						<hr />
				@endforeach
			@else
				<p>There are no food items in the system</p>
			@endif
			
				<button type="button" data-toggle="modal" data-target="#create" class="btn btn-block btn-default">Create a post</button>
			</div>
		</div>
	</div>
@stop