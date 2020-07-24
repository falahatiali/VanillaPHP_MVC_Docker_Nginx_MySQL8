<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 9:41 PM
 */

return [
	'mysql' => [
		'driver'	  => env('DB_DRIVER', 'pdo_mysql'),
		'host' 		  => env('DB_HOST', '127.0.0.1'),
		'dbname'      => env('DB_DATABASE', 'database'),
		'user' 		  => env('DB_USERNAME'),
		'password' 	  => env('DB_PASSWORD'),
		'port' 		  => env('DB_PORT' , 3306),
	]
];
