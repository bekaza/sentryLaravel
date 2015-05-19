<?php

class RegistrationController extends BaseController
{
	
	function create(){
		return View::make('pages.register');
	}

	function store(){
		return Input::all();
	}
}