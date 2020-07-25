<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

try{
	$dotenv = Dotenv\Dotenv::createImmutable(base_path());
	$dotenv->load();
}catch (\Exception $exception){}

require_once base_path('/bootstrap/container.php');

$route  = $container->get(\League\Route\RouteCollection::class);

require_once base_path('/bootstrap/middleware.php');

require_once  base_path('routes/web.php');


try{
    $response = $route->dispatch(
        $container->get('request') , $container->get('response')
    );
}catch (\Exception $exception){
    $handler = new \App\Exceptions\Handler($exception , $container->get(\App\Session\SessionStore::class));
    $response = $handler->respond();
}