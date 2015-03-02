<?php 
	// dd($posts);
 ?>

@extends('app')

@section('content')
	<div class="container">
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
			
			
			</div>
		</div>
	</div>
@stop