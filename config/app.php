<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 8:25 PM
 */

return [
	'app' 		=> env('APP_NAME'),
	'debug' 	=> env('APP_DEBUG'),
	'providers' => [
		\App\Providers\AppServiceProvider::class,
		\App\Providers\ViewServiceProvider::class,
		\App\Providers\DatabaseServiceProvider::class,
	]
];
