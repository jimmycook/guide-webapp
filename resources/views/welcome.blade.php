@include('templates.partials.header')
	<div class="container">
		<img class="center-block img-responsive" id="logo-welcome" src="{{ url('/images/logo.png') }}" alt="Guide">
		
		<form class="col-sm-6 col-sm-offset-3" role="form" method="POST" action="{{ url('/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="form-group">
				<label class="control-label">E-Mail Address</label>
				<div class="">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}">
				</div>
			</div>

			<div class="form-group">
				<label class=" control-label">Password</label>
				<div class="">
					<input type="password" class="form-control" name="password">
				</div>
			</div>

			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember"> Remember Me
				</label>
			</div>

			<div class="form-group">
				<div class="">
					<button type="submit" class="btn btn-lg btn-primary btn-block">
						Login
					</button>

				</div>
			</div>

			<p class="text-center"><a href="{{ url('/auth/register') }}">Need an account?</a></p>
			
		</form>	
	</div>

@include('templates.partials.footer')