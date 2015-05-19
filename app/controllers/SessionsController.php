<?php

class SessionsController extends BaseController
{
	
	function create(){
		return Redirect::route('login_view');
	}

	function store(){
		// return Input::all();
		try
		{
		    // Login credentials
		    $credentials = array(
		        'screen_name'    => Input::get('screen_name'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, Input::has('remember'));
		    $user_logged = Sentry::getUser();
		    return Redirect::route('profile');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    $error = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $error = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    $error = 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $error = 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $error = 'User is not activated.';
		}

		return Redirect::back()->with('error_message',$error);
	}

	public function destroy($id=null)
	{
		Sentry::logout();

		return Redirect::home();
	}

	public function view(){
		return View::make('pages.login');
	}
}