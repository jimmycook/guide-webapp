@extends('app')

@section('content')
	<div class="container">	
		@include('flash::message')
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>View Food Item</h4>
			</div>
			<div class="panel-body">
			@if(count($food))
				<div class="row">
					
					<div class="col-sm-8">
						<h4>{{ $food->name }}</h4>
						<p><strong>Carbohydrate:</strong> {{ $food->carb}}g per medium item</p>
						<p><strong>Calories:</strong> {{ $food->carb}} calories</p>
						<p>{{ $food->description }}</p>

					</div>
					<div class="col-sm-4">
						<img src="{{ $food->image }}" alt="Food image" class="img-responsive">
					</div>
				</div>

				<div class="embed-responsive embed-responsive-16by9">
				  	<iframe class="embed-responsive-item" src="{{$food->video}}"></iframe>
				</div>

				<hr />
			@else
				<p>There are no food items in the system</p>
			@endif
			
			<p class="text-center"><a href="/food">Food home</a></p>
			</div>
		</div>
	</div>
@stop