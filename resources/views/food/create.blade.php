@extends('app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Create a Post</h4></div>
		<div class="panel-body">
			{!! Form::open() !!}
				
				<div class="form-group">
					
					{!! Form::label('title', 'Title:') !!}	
					{!! Form::text('title', null, ['class' => 'form-control']) !!}
			
				</div>
				
				<div class="form-group">
					
					{!! Form::label('body', 'Body:') !!}	
					{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
			
				</div>
				<div class="form-group">
					<div class="col-xs-6">
						{!! Form::submit('Create', ['class'=>'col-xs-6 btn btn-block btn-primary']) !!}

					</div> 
					<div class="col-xs-6">
						<a href="{{ url('/blog') }}" class="col-xs-6 btn btn-block btn-default">Close</a>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>	
</div>
@stop