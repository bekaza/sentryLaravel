@extends('master')
  
@section('content')
  
	{{Form::open(array('route'=>'registration'))}}
		<h1>Register</h1>
		<div>
			<input id="username" type="text" name="email" placeholder="Enter Email" required="" value="{{Input::old('email')}}" />
		</div>
		<div>
			<input id="username" type="text" name="username" placeholder="Enter Username" required="" value="{{Input::old('username')}}" />
		</div>
		<div>
			<input id="password" type="password" name="password" placeholder="Enter Password" required="" /></div>
		<div>
		<input id="password" type="password" name="password_confirmation" placeholder="Confirm Password" required="" /></div>
		<div>
		<input type="submit" value="Register" />
	 
	{{Form::close()}}
  
@stop