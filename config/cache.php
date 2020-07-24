<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 8:26 PM
 */

return[
	'views' =>  [
		'enabled' => $enabled = env('CACHE_VIEWS'),
		'path' => $enabled ? base_path('cache/views'):false
	]
];
