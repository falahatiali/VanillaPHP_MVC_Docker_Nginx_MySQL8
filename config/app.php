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
		\App\Providers\SessionServiceProvider::class,
		\App\Providers\HashServiceProvider::class,
		\App\Providers\AuthServiceProvider::class,
		\App\Providers\CsrfServiceProvider::class,
		\App\Providers\ViewShareServiceProvider::class,
		\App\Providers\ValidationServiceProvider::class,
	],

    'middlewares' => [
		\App\Middlewares\Authenticate::class,
		\App\Middlewares\ShareValidationErrors::class,
        \App\Middlewares\ClearValidationErrors::class,
        \App\Middlewares\CsrfGuard::class,
    ]
];
