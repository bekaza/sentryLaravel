@extends('master')

@section('title','Register')
 
@section('style')
	<style type="text/css" media="screen">
		.image-avater{
			text-align: center;
		}
		.thumb{
			width: 120px;
			height: 120px;
		}
		.input_image-avater{
			display: initial !important;
		}
	</style>
@stop

@section('content')

	<div class="col-md-6 col-md-offset-3">
	    <div class="panel panel-default">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Register</h3>
		 	</div>
			  	<div class="panel-body">
			    	{{ Form::open(['route' => 'registration']) }}
                    <fieldset>

                    	@if (Session::has('flash_message'))
							<div class="form-group">
								<p>{{ Session::get('flash_message') }}</p>
							</div>
						@endif

						<!-- Image Avater -->
						<div class="form-group image-avater">
							{{HTML::image(asset('/asset/img/profile.png'), null, ['id'=>'image-avater','class' => 'thumb'], null)}}
							{{Form::file('image',['class'=>'input_image-avater'])}}
						</div>


			    	  	<!-- Email field -->
						<div class="form-group">
							{{ Form::text('screen_name', null, ['placeholder' => 'Srceen Name', 'class' => 'form-control', 'required' => 'required'])}}
						</div>

						<!-- Password field -->
						<div class="form-group">
							{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required'])}}
						</div>

						<!-- Password Confirmation field -->
						<div class="form-group">
							{{ Form::password('password_confirmation', ['placeholder' => 'Password Confirm', 'class' => 'form-control', 'required' => 'required'])}}

						</div>

						<!-- First name field -->
						<div class="form-group">
							{{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control', 'required' => 'required'])}}
						</div>

						<!-- Last name field -->
						<div class="form-group">
							{{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control', 'required' => 'required'])}}
						</div>

						<!-- E-mail field -->
						<div class="form-group">
							{{ Form::text('e-mail', null, ['placeholder' => 'E - mail', 'class' => 'form-control', 'required' => 'required'])}}
						</div>

						<!-- Submit field -->
						<div class="form-group">
							{{ Form::submit('Create Account', ['class' => 'btn btn-lg btn-primary btn-block']) }}
						</div>
			    	</fieldset>
			      	{{ Form::close() }}
			</div>
		</div>
			<p style="text-align:center">Already have an account? <a href="{{route('login')}}">Login</a></p>
	</div>
  
@stop

@section('script')
	<script type="text/javascript" charset="utf-8">

		var path_resource = "{{asset('/asset')}}";

		$(".input_image-avater").change(function(){
	    	readURL($(this).val());
		});

		function readURL(input) {
			var filename = input.split('\\').pop();
			$("#image-avater").attr('src', path_resource + "/img/" + filename);
			console.log(path_resource + "/img/" + filename);
		}
	</script>
@stop