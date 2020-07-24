<?php
/**
 * Created by PhpStorm.
 * User: fali
 * Date: 7/24/20
 * Time: 3:16 PM
 */

use App\Providers\ConfigServiceProvider;

$container = new \League\Container\Container;

$container->delegate(new \League\Container\ReflectionContainer());

$container->addServiceProvider(new ConfigServiceProvider());

foreach($container->get('config')->get('app.providers') as $provider) {
	$container->addServiceProvider($provider);
}


