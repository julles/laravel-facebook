<?php namespace Reza;

use Illuminate\Support\Facades\Facade;

class RezaFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'register-facebook';
	}
}