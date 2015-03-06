@extends('app')

@section('content')
<div class="container">
	<div class="jumbotron">
	  	<h1 style="font-family: 'Satisfy'">Guide</h1>
		<p>A web app for food and more</p>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Random Food Item</h4>
		</div>
		<div class="panel-body">
		@if(count($food))
			<div class="row">
				<div class="col-sm-4">
					<img src="{{ $food->image }}" alt="Food image" class="img-responsive">

				</div>
				<div class="col-sm-8">
					<h4>{{ $food->name }}</h4>
			
					<p>{{ str_limit($food->description, 300, '...') }}</p>

					<select id="mySelect" onchange="myFunction()">
						<option value="" disabled selected>Select your option</option>
						<option value="carb">Carbohydrates</option>
						<option value="cal">Calories</option>
					</select>


					<p id="demo"></p>

					<script>
					var carb ="{{ $food->carb}}g per medium item";
					var cal = "{{ $food->cal}} calories";

					function myFunction() {
						var e = document.getElementById("mySelect");
						var x = e.options[e.selectedIndex].value;
					    if(x == 'cal'){
					    	$("#demo").text(cal);
					    }
					    else if(x == 'carb'){
					    	$("#demo").text(carb);
					    }

					}
					</script>
				</div>
			</div>
			<hr />

			<p class="text-center"><a href="/food/{{ $food->slug }}">View in full</a></p>

		@else
			<p>There are no food items in the system</p>
		@endif
		
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Blog</h4>
		</div>
		<div class="panel-body">
			@if(count($posts))
				@foreach($posts as $post)
					<h4>{{ $post->title }}</h4>
					<p>{{ $post->body }}</p>
					<p class="text-muted text-right">Posted by {{ $post->user->username }}, {{ $post->created_at->diffForHumans() }} <a href="{{ url('/blog/'.$post->slug) }}"><span class="glyphicon glyphicon-link"></span></a></p>
					<hr />
				@endforeach
			@else
			<p>There are no posts</p>
			@endif
		
			<p class="text-center"><a href="/blog">Blog home</a></p>
		</div>
	</div>
</div>
@endsection
