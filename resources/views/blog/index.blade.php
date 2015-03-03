<?php 
	// dd($posts);
 ?>

@extends('app')

@section('content')
	<div class="container">	
		@include('flash::message')
		
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
			
				<button type="button" data-toggle="modal" data-target="#create" class="btn btn-block btn-default">Create a post</button>
			</div>
		</div>
	</div>

	<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
        {!! Form::open() !!}

		<div class="modal-dialog">
		    <div class="modal-content">
			     <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="createModal">Create a post</h4>
			      </div>
		      	<div class="modal-body">
		        	
	        	<div class="form-group">
	        		
	        		{!! Form::label('title', 'Title:') !!}	
	        		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	        
	        	</div>
		        	
		        	<div class="form-group">
		        		
		        		{!! Form::label('body', 'Body:') !!}	
		        		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
		        
		        	</div>
		        </div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
		      	</div>
		    </div>
		</div>
	  {!! Form::close() !!}	      

	</div>
@stop