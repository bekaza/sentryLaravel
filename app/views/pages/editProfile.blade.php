@extends('master')

@section('title','Edit-Profile')

@section('content')

<h1 style="text-align:center;">Edit Profile</h1>

<div class="col-md-6 col-md-offset-3">

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	{{ Form::model($user, ['method' => 'PATCH', 'route' => ['profiles.update', $user->id]]) }}

		<!-- Screen Name Field -->
		<div class="form-group">
			{{ Form::label('screen_name', 'Screen Name:') }}
			{{ Form::text('screen_name', null, ['class' => 'form-control']) }}
		</div>


		<!-- first_name Field -->
		<div class="form-group">
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name', null, ['class' => 'form-control']) }}
		</div>

		<!-- last_name Field -->
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name', null, ['class' => 'form-control']) }}

		</div>

		<!-- E-mail Field -->
		<div class="form-group">
			{{ Form::label('email', 'E - mail:') }}
			{{ Form::email('email', null, ['class' => 'form-control']) }}
		</div>

		<!-- Password field -->
		<div class="form-group">
			{{ Form::label('password', 'New Password:') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			<p class="help-block">Leave password blank to NOT edit the password.</p>
		</div>

		<!-- Password Confirmation field -->
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Repeat Password:') }}
			{{ Form::password('password_confirmation', ['class' => 'form-control'] )}}
		</div>


		<!-- Update Profile Field -->
		<div class="form-group pull-right">
			{{ Form::submit('Update Profile', ['class' => 'btn btn-success']) }}
		</div>

	{{ Form::close() }}
	
</div>
@stop