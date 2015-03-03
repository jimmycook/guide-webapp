@extends('app')

@section('content')
<div class="container">
	<div class="jumbotron">
		  <h1>Welcome to Guide</h1>
		  <p>A web app for food and more</p>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Random Food Item</h4>
		</div>
		<div class="panel-body">
		@if(count($food))
			<img src="{{ $food->image }}" alt="Food image" class="img-responsive">
			<h4>{{ $food->name }}</h4>
	
			<p>{{ $food->description }}</p>

			<hr />
		@else
			<p>There are no food items in the system</p>
		@endif
		
		<p class="text-center"><a href="/food/{{ $food->slug }}">View in full</a></p>
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
