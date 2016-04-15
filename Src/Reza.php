<?php namespace Reza;

use Facebook\Facebook;

class Reza
{
	public $fb;

	public function __construct()
	{
		$this->fb = new Facebook([
		  'app_id' => config('fb.app_id'),
		  'app_secret' => config('fb.app_secret'),
		  'default_graph_version' => config('fb.default_graph_version'),
		  //'default_access_token' => '{access-token}', // optional
		]);
	}

	public function hello()
	{
		$fb = $this->fb;
	}

	public function generateUrlLogin($callback = "")
	{
		$callback = ($callback != '') ? $callback : config('fb.callback_url');

		$fb = $this->fb;

		$helper = $fb->getRedirectLoginHelper();

		$loginUrl = $helper->getLoginUrl($callback);

		return $loginUrl;
	}
}