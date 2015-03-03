@extends('app')

@section('content')
	<div class="container">	
		@include('flash::message')
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>View Post</h4>
			</div>
			<div class="panel-body">
			@if(count($post))
				<h4>{{ $post->title }}</h4>
				<p>{{ $post->body }}</p>
				<p class="text-muted text-right">Posted by {{ $post->user->username }}, {{ $post->created_at->diffForHumans() }} <a href="{{ url('/blog/'.$post->slug) }}"><span class="glyphicon glyphicon-link"></span></a></p>
				<hr />
			@else
				<p>There are no posts</p>
			@endif
			<p class="text-center"><a href="/blog">Blog home</a></p>
			</div>
		</div>
	</div>
@stop