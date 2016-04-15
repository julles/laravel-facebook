[![Total Downloads](https://poser.pugx.org/muhamadrezaar/facebook/d/total.svg)](https://packagist.org/packages/muhamadrezaar/facebook)
[![Latest Stable Version](https://poser.pugx.org/muhamadrezaar/facebook/v/stable.svg)](https://packagist.org/packages/muhamadrezaar/facebook/v/stable.svg)
[![License](https://poser.pugx.org/muhamadrezaar/facebook/license.svg)](https://packagist.org/packages/muhamadrezaar/facebook)

# Laravel 5 Facebook Package

###### catatan : Sedang tahap development masih baru

### Cara instal 

1.Tambahkan ke composer

```sh
composer require muhamadrezaar/facebook:"dev-master"
```

2. Register Provider dan Facade di config/app.php

```sh
Reza\RezaProvider::class,
```

```sh
'FB'=> Reza\RezaFacade::class,
```

3. Publish konfigurasi

```sh
php artisan vendor:publish
```

4. resgistrasi aplikasi facebokk anda di config/FacebookConfig.php

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

1.Menggenerate Url Authorize Facebook

```sh
<?php
echo \FB::generateUrlLogin();
```


