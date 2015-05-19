<?php

class UserController extends BaseController
{
	protected $user;

	function __construct()
	{
		$this->user = Sentry::getUser();
	}

	// Show View Profile
	public function show(){
		return View::make('pages.profile', array('user' => $this->user));
	}

	public function edit(){
		return View::make('pages.editProfile', array('user' => $this->user));
	}

	public function update($id){
		
		try
		{	
			$user = Sentry::findUserById($id);

			if($user->checkPassword(Input::get('password_confirmation')))
		    {
		        if( Input::has('password') ){
					// change Password
					$resetCode = $user->getResetPasswordCode();
					if ( !$user->attemptResetPassword($resetCode, Input::get('password')) )
			        {
			           $error = "Password reset failed";
			        }
			        else
			        {
			            return "Password reset Success";
			        }
				}else{
					return Input::only('screen_name');
				}


		    }else{
		        $error = 'Password does not match.';
		    }

		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $error = 'User was not found.';
		}
		return Redirect::back()->with('flash_message',$error);
	}
}