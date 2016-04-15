<?php namespace Reza;

use Illuminate\Support\ServiceProvider;
use Reza\Reza;

class RezaProvider extends ServiceProvider
{
	public function boot()
	{
		include  __DIR__."/vendor/autoload.php";

		$this->publishes([__DIR__.'/FacebookConfig.php' => config_path('FacebookConfig.php')]  , 'fb');
	}

	public function register()
	{
		$configFile = config_path('FacebookConfig.php');

		if(file_exists($configFile))
		{
			$this->mergeConfigFrom($configFile , 'fb');
		}else{
			$this->mergeConfigFrom(__DIR__.'/FacebookConfig.php', 'fb');
		}

		$this->app->bind('register-facebook' , function(){
			return new Reza;
		});
	}
}