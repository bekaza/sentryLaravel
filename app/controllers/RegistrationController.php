<?php

class RegistrationController extends BaseController
{
	
	function create()
	{
		return View::make('pages.register');
	}

	function store()
	{

		$attribute = array(
			'screen_name' => Input::get('screen_name'),
			'password' => Input::get('password'),
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email'),
		);

		if(Input::hasFile('image'))
		{
			$attribute['image_avater'] = Input::file('image')->getClientOriginalName();
		}

		try
		{
		    // Let's register a user.
		    $user = Sentry::register($attribute);

		    // Let's get the activation code
		    $user->getActivationCode();

		    // Send activation code to the user so he can activate the account
		    return Redirect::route('login_view');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    $error = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $error = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    $error = 'User with this login already exists.';
		}

		return Redirect::back()->with('flash_message', $error);
		
	}
}