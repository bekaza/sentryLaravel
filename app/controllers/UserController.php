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
		//return Input::all();
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
			           return $this->error("Password reset failed");		           
			        }
				}

				$user->screen_name = Input::get('screen_name');
			    $user->first_name = Input::get('first_name');
			    $user->last_name = Input::get('last_name');
			    $user->email = Input::get('email');

			    // Update the user
			    if (!$user->save())
			    {
			        return $this->error("User information was not updated");		
			    }

		    }else{
		    	return $this->error('Password does not match.');	       
		    }
		    return Redirect::route('profile')->with('flash_message','User has been updated successfully !!');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		   return $this->error('User was not found.');
		}	
	}

	public function error($err){
		return Redirect::back()->with('flash_message',$err);
	}
}