<?php namespace Reza;

/**
 * Laravel Facebokk Packages
 *
 * Auhtor : Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 * 
 */

use Facebook\Facebook;
use Session;

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

	/**
	 * Genrate Url Login Facebook
	 * jika paramter tidak disini maka akan mengambil paramter callback_url
	 * yang ada di config/FacebookConfig.php
	 * 
	 * @hasil string
	 */


	public function generateUrlLogin($callback = "")
	{
		$callback = ($callback != '') ? $callback : config('fb.callback_url');

		$fb = $this->fb;

		$helper = $fb->getRedirectLoginHelper();

		$loginUrl = $helper->getLoginUrl($callback);

		return $loginUrl;
	}

	public function getCallBack($fields = "")
	{
		$fb = $this->fb;
		
		// Restore Access token ke Session dengan nama variable : facebook_access_token

		$helper = $fb->getRedirectLoginHelper();
		$accessToken = $helper->getAccessToken();
		if (isset($accessToken)) {
			Session::put('facebook_access_token',(string) $accessToken);
		}
		//
		
		$fields = !empty($fields) ? implode(",", $fields) : 'id,name,email';

		$response = $fb->get('/me?fields='.$fields,session()->get('facebook_access_token'));
  		
  		$userNode = $response->getGraphUser();
  		
  		return $userNode;
  	}
}