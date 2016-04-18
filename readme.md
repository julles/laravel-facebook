[![Total Downloads](https://poser.pugx.org/muhamadrezaar/facebook/d/total.svg)](https://packagist.org/packages/muhamadrezaar/facebook)
[![Latest Stable Version](https://poser.pugx.org/muhamadrezaar/facebook/v/stable.svg)](https://packagist.org/packages/muhamadrezaar/facebook/v/stable.svg)
[![License](https://poser.pugx.org/muhamadrezaar/facebook/license.svg)](https://packagist.org/packages/muhamadrezaar/facebook)

# Laravel 5 Facebook Package

###### catatan : Sedang tahap development masih baru

### Cara instal 

Tambahkan ke composer

```sh
composer require muhamadrezaar/facebook:"dev-master"
```

Register Provider dan Facade di config/app.php

```sh
Reza\RezaProvider::class,
```

```sh
'FB'=> Reza\RezaFacade::class,
```

Publish konfigurasi

```sh
php artisan vendor:publish
```

resgistrasi aplikasi facebokk anda di config/FacebookConfig.php

```sh
<?php
return [
	'app_id' => 'YourAppID',
	'app_secret' => 'YourAPpSecret',
	'default_graph_version' => 'v2.5',
	'callback_url'	=> 'http://localhost:90'	
];
```

### Dokumentasi

Menggenerate Url Authorize Facebook

```sh
<?php
Route::get('login' , function(){
	@session::start();
	echo "<a href = '".\FB::generateUrlLogin(url('dapet'))."'>Login</a>";
});

```

Mendapatkan hasil callback login facebook

```sh
<?php
Route::get('dapet' , function(){
		@session_start();
		$dapet = \FB::getCallBack();
		dd($dapet);
});

```


