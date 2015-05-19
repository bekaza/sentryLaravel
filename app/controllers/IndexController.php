<?php

/**
* IndexController
*/
class IndexController extends BaseController
{
	
	public function home()
	{
		return View::make('pages.home');
	}
}