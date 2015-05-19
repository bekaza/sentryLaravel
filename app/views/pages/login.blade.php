@extends('master')

@section('title','Login')

@section('content')
	<div class="container">
	    <div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Login</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'sessions.store','method' => 'post']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<p style="padding:5px" class="bg-success text-success">{{ Session::get('flash_message') }}</p>
							@endif

							@if (Session::has('error_message'))
								<p style="padding:5px" class="bg-danger text-danger">{{ Session::get('error_message') }}</p>
							@endif

				    	  	<!-- Email field -->
							<div class="form-group">
								{{ Form::text('screen_name', null, ['placeholder' => 'Screen Name', 'class' => 'form-control', 'required' => 'required'])}}
								
							</div>

				    		<!-- Password field -->
							<div class="form-group">
								{{ Form::password('password', ['placeholder' => 'Password','class' => 'form-control', 'required' => 'required'])}}
								
							</div>

				    		<div class="checkbox">
				    	    	<!-- Remember me field -->
								<div class="form-group">			
									<label>
										<input type="checkbox" name="rememeber" value="remember">
										Remember Me ?
									</label>
								</div>
				    	    </div>

				    		<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Login', ['class' => 'btn btn btn-lg btn-success btn-block']) }}
							</div>
				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
				<div style="text-align:center">
					<p><a href="/forgot_password">Forgot Password?</a></p>
				</div>


			</div>
		</div>
	</div>
@stop