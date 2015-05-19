@extends('master')

@section('title','Profile')

@section('content')
<div class="col-md-6 col-md-offset-3">

	<h1>{{ $user->first_name }}'s Profile</h1>
		<ul>
			<li>ID : {{ $user->id }}</li>
			<li>Screen Name : {{ $user->screen_name }}</li>
			<li>First Name : {{ $user->first_name }}</li>
			<li>Last Name : {{ $user->last_name }}</li>
			<li>Coin : {{ $user->coin }}</li>
			<li>Flag : {{ $user->flag }}</li>
			<li>Experience : {{ $user->experience }}</li>
			<li>Travel Score : {{ $user->travel_score }}</li>
			<li>Respone Rate : {{ $user->respone_rate }}</li>
			<li>Review Rate : {{ $user->review_rate }}</li>
			<li>E - mail : {{ $user->email }}</li>
			<li>Activated : 
				@if($user->activated)
					<span class="glyphicon glyphicon-ok"></span>
				@else
					<span class="glyphicon glyphicon-remove"></span>
				@endif
			</li>	
			<li>Last - login : {{ $user->last_login }}</li>
		</ul>

	<a href="profile/edit">Edit Profile</a>
	
</div>
@stop